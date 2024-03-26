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
            <div class="page-header mb-1">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-lg-flex justify-content-between my-2">
                      <h4 class="">Bordered table</h4>
                      <div> <a href="{{url('add-user')}}" class="btn btn-success me-2">ADD+</a>  </div>
                    </div>         
                    <div class="w-100 d-flex justify-content-between mb-2">
                      <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-info me-2" id="download-btn" >Download CSV</button> 
                        <!-- <button type="submit" class="btn btn-warning me-2">Pdf</button>  -->
                      </div>
                      <input type="search" id="search-input" placeholder="Search...">
                    </div>           
                   
                    <div class="table-responsive">
                    @if(!empty($userDtls[0]))
                      <table class="table table-bordered" id="data-table">
                        <thead >
                          <tr>
                            <th> # </th>
                            <th> Profile image </th>
                            <th>Name </th>
                            <th> Email </th>
                            <th> Mobile </th>
                            <th> Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($userDtls as $key=> $userDtl)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td> <img class="img-xs rounded-circle " src="{{asset( $userDtl->profile_img)}}" onerror="this.onerror=null; this.src='{{ asset('images/no-img.png') }}';"></td>
                            <td>{{$userDtl->name}} </td>
                            <td> {{$userDtl->email}}  </td>
                            <td> {{$userDtl->mobile}} </td>
                            <td>
                              <a href="/edit-user/{{$userDtl->id}}" class="btn btn-primary btn-sm">  <i class="mdi mdi-pencil btn-icon-append"></i></a>   
                              <button href="/delete-user/{{$userDtl->id}}" class="btn btn-danger btn-sm"> <i class="mdi mdi-delete btn-icon-prepend"></i> </button>                         
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    @else
                      No data found
                    @endif
                    </div>
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
    document.getElementById('download-btn').addEventListener('click', function() {
        // Get table data
        var table = document.getElementById('data-table');
        var rows = table.querySelectorAll('tr');
        
        // Create CSV content
        var csvContent = "data:text/csv;charset=utf-8,";
        rows.forEach(function(row) {
            var rowData = [];
            row.querySelectorAll('td').forEach(function(cell) {
                if (cell.querySelector('img')) {
                    rowData.push(cell.querySelector('img').getAttribute('src'));
                } else {
                    rowData.push(cell.innerText.trim());
                }
            });
            csvContent += rowData.join(',') + "\n";
        });
        
        // Trigger download
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "data.csv");
        document.body.appendChild(link);
        link.click();
    });
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('search-input');
        const table = document.getElementById('data-table');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('keyup', function () {
            const searchTerm = searchInput.value.trim().toLowerCase();

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let found = false;

                cells.forEach(cell => {
                    if (cell.innerText.toLowerCase().includes(searchTerm)) {
                        found = true;
                    }
                });

                if (found) {
                    row.style.display = ''; // Show the row
                } else {
                    row.style.display = 'none'; // Hide the row
                }
            });
        });
    });
</script>


    
@endsection
