<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/backend/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/backend/app-assets/vendors/js/charts/chart.min.js') }}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/backend/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('assets/backend/app-assets/js/core/app.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('assets/backend/app-assets/js/scripts/pages/appointment.js') }}"></script>
<!-- END: Page JS-->

<!-- END: Page JS-->
<script src="{{asset('assets/backend/app-assets/js/scripts/pages/app-chat.js')}}"></script> 
<script src="{{asset('js/select2.full.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.js')}}"></script>
<script src="{{asset('js/bootstrap.dataTables.js')}}"></script>
<script>
    $('.select2').select2();
    $('.datatable').dataTable();
</script>