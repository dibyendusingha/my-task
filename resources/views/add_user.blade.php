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
              <h3 class="page-title"> Add User </h3>
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
                    <h4 class="card-title">Add User</h4>
                    <!-- <p class="card-description"> Horizontal form layout </p> -->
                    <form class="forms-sample"  method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile number">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password" name="password" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Password confirmation</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="col-sm-3 col-form-label">Image upload</label>
                        <div class="col-sm-9">
                          <input type="file" name="image" id="image"  class="file-upload-default">
                          <div class="input-group col-sm-9">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                          </div>
                        </div>
                      </div>
                      <button type="submit" name="store_user" class="btn btn-primary me-2">Submit</button>
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

    <script>
      function validateForm() {
        // Validate Name field
        // var nameRegex = /^[A-Za-z]+$/;
        if ($("#name").val() == "") {
          alert("Please enter your name!");
          return false;
        }
        // else if (!nameRegex.test($("#name").val())) {
        //   alert("Name should contain only alphabetic characters!");
        //   return false;
        // }

        // Validate Email field
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if ($("#email").val() == "") {
          alert("Please enter your email!");
          return false;
        } else if (!emailRegex.test($("#email").val())) {
          alert("Please enter a valid email address!");
          return false;
        }

        // Validate Mobile field
        var mobileRegex = /^\d{10}$/;
        if ($("#mobile").val() == "") {
          alert("Please enter your mobile number!");
          return false;
        } else if (!mobileRegex.test($("#mobile").val())) {
          alert("Mobile number should be 10 digits!");
          return false;
        }

        // Validate Password field
        if ($("#password").val() == "") {
          alert("Please enter your password!");
          return false;
        }

        // Validate Password Confirmation field
        if ($("#password_confirmation").val() == "") {
          alert("Please confirm your password!");
          return false;
        } else if ($("#password_confirmation").val() !== $("#password").val()) {
          alert("Passwords do not match!");
          return false;
        }

        // Validate Image Upload
        var fileInput = $("#image")[0];
        if (fileInput.files.length === 0) {
          alert("Please upload an image!");
          return false;
        }

        // Add more validations here if needed

        return true; // Submit the form if all validations pass
      }
    </script>

    
@endsection
