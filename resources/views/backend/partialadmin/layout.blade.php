<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
 @include('backend.partialadmin.link')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

   4 <!-- BEGIN: Header-->
   @include('backend.partialadmin.header')

    <!-- END: Header-->


   5 <!-- BEGIN: Main Menu/SIDEBAR-->
   @include('backend.partialadmin.sidebar')


    <!-- END: Main Menu-->


    6<!-- BEGIN: Content-->
    @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    2<!-- BEGIN: Footer-->
    @include('backend.partialadmin.footer')
    <!-- END: Footer-->


   <!-- BEGIN: Script-->
   @include('backend.partialadmin.script')
   <!-- END: Script-->


   
</body>
<!-- END: Body-->

</html>