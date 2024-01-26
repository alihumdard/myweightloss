<!-- jQuery -->
<script src="/assets/admin/plugins/jquery/jquery.min.js"></script>

  <!-- Favicons -->
  <link href="{{asset('assets/admin/dist/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/admin/dist/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Bootstrap v5.3.2-->
<script src="{{asset('/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}"></script>
<script src="{{asset('/assets/admin/plugins/bootstrap-icons/bootstrap-icons.css')}}"></script>
<script src="{{asset('/assets/admin/plugins/boxicons/css/boxicons.min.css')}}"></script>
<script src="{{asset('/assets/admin/plugins/quill/quill.snow.css')}}"></script>
<script src="{{asset('/assets/admin/plugins/quill/quill.bubble.css')}}"></script>
<script src="{{asset('/assets/admin/plugins/remixicon/remixicon.css')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('/assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- jquery-validation -->
<script src="{{asset('/assets/admin/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('/assets/admin/plugins/jquery-validation/additional-methods.min.js')}}"></script>
 <!-- Summernote -->
<script src="{{asset('/assets/admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/assets/admin/dist/js/main.js')}}"></script>
<script src="{{asset('/assets/admin/dist/css/style.css')}}"></script>

<!-- Ekko Lightbox -->
<!-- {{--  <script src="assets/admin/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>  --}} -->
<!-- Filterizr-->
<!-- {{--  <script src="assets/admin/plugins/filterizr/jquery.filterizr.min.js"></script>  --}} -->
<!-- AdminLTE for demo purposes -->
<!-- {{--  <script src="assets/admin/dist/js/demo.js"></script>  --}} -->

<script>
  $(function() {
    $('.datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
   // Summernote
   $('.summernote').summernote({
    height:200,
   });

</script>