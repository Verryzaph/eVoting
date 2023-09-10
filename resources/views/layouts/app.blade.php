<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>{{config('app.name','Online Voting System')}}</title>
  <link rel="shortcut icon" href="{{asset('images/vote (1).png')}}" type="image/x-icon">
  <!-- Bootstrap CSS Link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom styles for this template-->
  <link href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
 
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->
 
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
 
      <!-- Main Content -->
      <div id="content">
 
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
 
        <!-- Begin Page Content -->
        <div class="container-fluid">
 
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
            <a href="{{ route('admin.home') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-house fa-sm text-white-50"></i> Home</a>
          </div>
 
          @yield('contents') 
 
        </div>
        <!-- /.container-fluid -->
 
      </div>
      <!-- End of Main Content -->
 
      <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->
 
    </div>
    <!-- End of Content Wrapper -->
 
  </div>
  <!-- End of Page Wrapper -->
 
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm btn-flat" type="button" data-bs-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary btn-sm btn-flat" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>
 
  <!-- Bootstrap JavaScript Link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
  <script>
    $(document).ready(function(){
      // jquery for datatables
      $('#dataTable').DataTable();

      // jquery for modal
      $('body').on('click', '#show-platform', function(){
      var platformURL = $(this).data('url');
      $.get(platformURL, function(data){
        $('#staticBackdrop').modal('show');
        $('#firstname').text(data.firstname);
        $('#lastname').text(data.lastname);
        $('#platform').text(data.platform);
      })
    })
    });
  </script>
</body>
</html>