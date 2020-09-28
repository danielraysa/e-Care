<!DOCTYPE html>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
   @include('backend.partialadmin.link')
   @stack('css')
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
{{-- <body class="vertical-layout vertical-menu 2-columns fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns"> --}}
<body class="vertical-layout vertical-menu content-left-sidebar chat-application fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar">
   <!-- BEGIN: Header-->
   @include('backend.partialadmin.header')
   <!-- END: Header-->

   <!-- BEGIN: Main Menu/SIDEBAR-->
   @include('backend.partialadmin.sidebar')
   <!-- END: Main Menu-->

   <!-- BEGIN: Content-->
   @yield('content')
   <!-- END: Content-->

   <div class="sidenav-overlay"></div>
   <div class="drag-target"></div>
   <!-- Toast -->
   <div id="toast_notif" style="position: fixed; top: 5rem; right: 0.5rem; z-index: 2; width: 300px">
      {{-- <div class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
         <div class="toast-header">
            <strong class="mr-auto">Bootstrap</strong>
            <small class="text-muted">just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="toast-body">
            See? Just like this.
         </div>
      </div> --}}
   </div>
   <!-- BEGIN: Footer-->
   @include('backend.partialadmin.footer')
   <!-- END: Footer-->

   <!-- BEGIN: Script-->
   @include('backend.partialadmin.script')
   <!-- END: Script-->
   @stack('js')
</body>
<!-- END: Body-->

</html>