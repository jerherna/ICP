<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--<title>{{ config('app.name', 'Interlink') }}</title>-->
    <title>Interlink Church Portal</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">-->
    <link href="{{ asset('plugins/icon-kit/dist/css/iconkit.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/ionicons/dist/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-common.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/theme.min.css') }}" rel="stylesheet">

    <script src="{{ asset('src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <script src="{{ asset('src/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('plugins/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
</head>
<body>
    <div id="app">
        <div class="wrapper">
            <!--header-->
            @include('headside.header')
            <div class="page-wrap">
                <!--sidebar-->
                @include('headside.sidebar')
                

                <div class="main-content scrollable pr-0 mr-0">
                    <div class="container-fluid">
                      <!-- CONTENT-->
                      @yield('content')
                      <!--// CONTENT-->
                    </div>
                </div>
                
                <footer class="footer">
                    <div class="w-100 clearfix ml-auto">
                        <span class="text-center text-sm-center d-md-inline-block">Copyright © <Computed Value> Interlink Business Solutions Inc. All Rights Reserved.</span>
                       <!--
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://lavalite.org/" class="text-dark" target="_blank">Lavalite</a></span>
                        -->
                    </div>
                </footer>

            </div>
        </div>
        
        
        <!--
        <div class="row">
            
    
            <main class="mx-auto py-5 col-md-9">
                
            </main>
        </div>
        -->
    </div>

    <script src="{{ asset('/plugins/moment/moment.js') }}"></script>
    <script src="{{ asset('/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('/plugins/perfect-scrollbar/dist/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset('/plugins/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>
    <script src="{{ asset('/plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('/dist/js/theme.js') }}"></script>
    <script src="{{ asset('/js/bootstrap-modal.js') }}"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <script src="{{ asset('/js/xpages-view.js') }}"></script>
</body>
</html>
