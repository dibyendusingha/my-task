@extends('layout.app')


@section('custom_css')


<!-- Plugin css for this page -->
<link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
<link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
<!-- End plugin css for this page -->

@endsection


@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Edit User </h3>
            <!-- <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav> -->
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit User</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" action="{{url('update-user',$edit_user->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$edit_user->name}}" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="email" name="email" value="{{$edit_user->email}}" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="mobile" name="mobile" value="{{$edit_user->mobile}}" placeholder="Mobile number">
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-3 col-form-label">Image upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="file-upload-default">
                                    <div class="input-group col-sm-9">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    <img id="previewImage" src="{{asset($edit_user->profile_img)}}" alt="" style="width: 100px; height: 100px; border-radius: 15px; border:3px solid black">
                                </div>
                            </div>
                            <div class="input-group col-sm-9">
                                <div class="col-sm-9" id="previewContainer">
                                </div>
                            </div>
                            <button type="submit" name="store_user" class="btn btn-primary me-2">Update</button>
                            <button class="btn btn-dark">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
        </div>
    </footer>
    <!-- partial -->
</div>
@endsection



@section('custom_js')

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/file-upload.js"></script>
<script src="assets/js/typeahead.js"></script>
<script src="assets/js/select2.js"></script>


@endsection