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