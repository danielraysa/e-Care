
<!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>{{ env('APP_NAME') }}</title>
        <link rel="apple-touch-icon" href="{{ asset('assets/backend/app-assets/images/ico/apple-icon-120.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/backend/app-assets/images/ico/favicon.ico') }}">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/vendors/css/vendors.min.css') }}">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap-extended.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/colors.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/components.min.css') }}">
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/core/colors/palette-gradient.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/pages/error.min.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/css/style.css') }}">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body class="vertical-layout vertical-menu-modern 1-column   blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="flexbox-container">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="col-lg-4 col-md-8 col-10 p-0">
                                <div class="card-header bg-transparent border-0">
                                    <h2 class="error-code text-center mb-2">Error!</h2>
                                    <h3 class="text-uppercase text-center">{{ $exception->getMessage() }}</h3>
                                </div>
                                <div class="card-content">
                                    
                                    <div class="row py-2">
                                        <div class="col-12">
                                            <a href="{{ route('home') }}" class="btn btn-primary btn-block"><i class="ft-home"></i> Home</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- END: Content-->

    </body>
    <!-- END: Body-->
</html>