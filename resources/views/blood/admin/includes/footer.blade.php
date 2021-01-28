
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('blood/admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/jquery-ui.min.js') }}"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script src="{{ asset('blood/admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/select2.full.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/moment.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/daterangepicker.js') }}"></script>
<script src="{{ asset('blood/admin/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('blood/admin/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('blood/admin/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('blood/admin/js/adminlte.js') }}"></script>
<script src="{{ asset('blood/admin/js/dashboard.js') }}"></script>
<script src="{{ asset('blood/admin/js/toastr.js') }}"></script>
<script>
    //var image_base_path = "http://localhost:8000/";
    var image_base_path = "http://blood.imbidhan.me/";
    $('.select2').select2();
    $(function () {
      $(".data_table").DataTable();
    });
    $('.datePicker').daterangepicker({
        singleDatePicker: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
</script>
@yield('scripts')
@if(Session::has('error_message'))
    <script>
        toastr.error("{{ Session::get('error_message') }}")
    </script>
@endif
@if(Session::has('message'))
    <script>
        toastr.success("{{ Session::get('message') }}")
    </script>
@endif
</body>
</html>