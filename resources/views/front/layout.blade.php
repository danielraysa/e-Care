<!doctype html>
<html lang="en">

    <head>
    @include('front.link')
    </head>

<body>
    <!-- begin header -->
    @include('front.header')
    <!-- Header part end-->

    <!-- begin content-->
    @yield('home')
    <!-- end conteng -->

    <!-- begin footer -->
    @include('front.footer')
    <!-- end footer -->
   
    <!-- begin script -->
    @include('front.script')
    <!-- end scrip -->
   
</body>

</html>