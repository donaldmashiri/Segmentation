<!DOCTYPE html>
<html lang="en">

<head>
    <title>CUSTOMER SEGMENTATION IN PRIVATE BANKING</title>
    <link rel="icon" href="{{ asset('img/logo2.png') }}" type="image/x-icon">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->


    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- themify -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">

    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/simple-line-icons/css/simple-line-icons.css') }}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/chartist/dist/chartist.css') }}" type="text/css" media="all">

    <!-- Weather css -->
    <link href="{{ asset('assets/css/svg-weather.css') }}" rel="stylesheet">


    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body class="sidebar-mini fixed">
<div class="loader-bg">
    <div class="loader-bar">
    </div>
</div>
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        <a href="/" class="logo"><img class="img-fluid able-logo" src="{{ asset('images/logo.png') }}" alt="Theme-logo"></a>
        <nav class="navbar navbar-static-top bg-primary">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <ul class="top-nav lft-nav">
                <li>
                    <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                        CUSTOMER SEGMENTATION IN PRIVATE BANKING
                    </a>
                </li>
            </ul>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu f-right">
                <ul class="top-nav">
                    <!--Notification Menu-->

                    <!-- window screen -->
                    <li class="pc-rheader-submenu">
                        <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                    </li>
                    <!-- User Menu-->
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="{{ asset('images/logo.png') }}" style="width:40px;" alt="User Image"></span>
                            <span>Donnie <i class=" icofont icofont-simple-down"></i></span>

                        </a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="#"><i class="icon-user"></i> Profile</a></li>

                            <li><a href="login1.html"><i class="icon-logout"></i> Logout</a></li>

                        </ul>
                    </li>
                </ul>

                <!-- search -->
                <div id="morphsearch" class="morphsearch">
                    <form class="morphsearch-form">

{{--                        <input class="morphsearch-input" type="search" placeholder="Search..." />--}}

{{--                        <button class="morphsearch-submit" type="submit">Search</button>--}}

                    </form>

                    <!-- /morphsearch-content -->
                    <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
                </div>
                <!-- search end -->
            </div>
        </nav>
    </header>


    <main class="py-4">
        @yield('content')
    </main>




    <!-- Required Jqurey -->
    <script src="{{ asset('assets/plugins/Jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>

    <!-- Required Fremwork -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Scrollbar JS-->
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!--classic JS-->
    <script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>

    <!-- notification -->
    <script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

    <!-- Sparkline charts -->
    <script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

    <!-- Counter js  -->
    <script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

    <!-- Echart js -->
    <script src="{{ asset('assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>

    <!-- custom js -->
    <script type="text/javascript" src="{{ asset('assets/js/main.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/pages/dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/pages/elements.js') }}"></script>
    <script src="{{ asset('assets/js/menu.min.js') }}"></script>
    <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function(){
            if ($window.scrollTop() >= 200) {
                nav.addClass('active');
            }
            else {
                nav.removeClass('active');
            }
        });
    </script>

</body>

</html>


