<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function add_user(Request $request){
       
        if($request->has('store_user')) {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'mobile' => 'required|numeric|digits:10',
                'password' => 'required|string|min:6|confirmed'
            ]); 
             

            $img = $request->image; 
            if ($img) {
                $rand = rand(10000,99999);
                $imageName = time(). '_profileiimg_'.$rand.'.' . $img->extension();
                $img->move(public_path('images/profile'), $imageName);
                $relativePath = 'images/profile/' . $imageName;

            }else{
                $relativePath = null; 
            }
            // dd( $relativePath);

            
            try{
                DB::beginTransaction();
                $addUser = new User;
                $addUser->name              = $request->name;
                $addUser->mobile            = $request->mobile;
                $addUser->email             = $request->email;
                $addUser->profile_img       = $relativePath;
                $addUser->password          =   Hash::make($request->password);
                $addUser->save();
                DB::commit();
    
                return redirect('add-user')->with(['success' =>'User created successfully.']);
    
            }catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'with' => 'error',
                    'message' => 'Error creating user. ' . $e->getMessage(),
                ]);
            } 
        }
        return view('add_user');
    }

    public function user_list(Request $request){
        $data['userDtls']=User::get();
        return view('user_list',$data);
    }

    public function edit_user($id){
        $edit_user = User::where('id',$id)->first();
        return view('edit_user',['edit_user'=>$edit_user]);
    }

    public function update_user(Request $request,$user_id){
        //dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
            'mobile' => 'required|numeric|digits:10',
        ]);

        $img_det = User::where('id',$user_id)->first();
        $old_img = $img_det->profile_img;

        $profile_img = $request->image;
        if (!empty($request->image)) {
            $oldImagePath = $img_det->profile_img;
            if ($oldImagePath && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
         
            $rand = rand(10000,99999);
            $imageName = time(). '_img_'.$rand.'.' . $profile_img->extension();
            $profile_img->move(public_path('images/user'), $imageName);
            $relativePath = 'images/user/' . $imageName;
        }
        else if(empty($request->image)){
            $relativePath = $old_img; 
        }

        if ($validator->fails()) {
            $output['response']=false;
            $output['message']='Validation error!';
            $output['error'] = $validator->errors();
            return $output;
            exit;
        }else{

            try{
                DB::beginTransaction();
                $editUser = User::where('id',$user_id)->first();
                $editUser->name              = $request->name;
                $editUser->mobile            = $request->mobile;
                $editUser->email             = $request->email;
                $editUser->profile_img       = $relativePath;

                $editUser->update();
                DB::commit();
    
                return redirect('/')->with(['success' =>'User Update successfully.']);
    
            }catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'with' => 'error',
                    'message' => 'Error creating . ' . $e->getMessage(),
                ]);
            } 
        }
    }
    
}
