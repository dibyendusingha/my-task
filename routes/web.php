<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'user_list']);
Route::get('/add-user', [UserController::class, 'add_user']);
Route::POST('/add-user', [UserController::class, 'add_user']);

Route::get('/edit-user/{id}', [UserController::class, 'edit_user']);
Route::post('/update-user/{id}', [UserController::class, 'update_user']);
Route::get('/delete-user/{id}', [UserController::class, 'user_delete']);

Route::get('/edit-user-password/{id}', [UserController::class, 'edit_password_user']);
Route::post('/update-user-password/{id}', [UserController::class, 'update_password_user']);


