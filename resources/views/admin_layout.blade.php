<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css" />
    <link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('backend/css/morris.css')}}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{asset('backend/css/monthly.css')}}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->
    <script src="{{asset('backend/js/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('backend/js/raphael-min.js')}}"></script>
    <script src="{{asset('backend/js/morris.js')}}"></script>
    <style>
    .error {
        color: red;
    }
    </style>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="index.html" class="logo">
                    VISITORS
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown" style="padding: 0 10px">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span style="padding: 0 15px" class="username">
                                @if( Auth::check() )
                                {{Auth::user()->name}}
                                @endif
                            </span>
                    <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="{{route('admin.users.view-change')}}"><i class="fa fa-cog"></i>Đổi mật khẩu</a>
                        </li>
                        <li><a onclick="return confirm('Bạn thật muốn đăng xuất?')" href="{{route('admin-logout')}}"><i
                                    class="fa fa-key"></i>Đăng xuất</a></li>
                    </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="@yield('dashboard-active')" href="{{route('admin.dashboard')}}">
                                <i class="fa fa-dashboard"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                        @hasanyrole('Content|Admin|Sale')
                        <li class="sub-menu">
                            <a class="@yield('cate-active')" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh mục sản phẩm</span>
                            </a>
                            <ul class="sub">
                                @role('Content|Admin')
                                <li><a href="{{route('admin.categories.create')}}">Thêm mới</a></li>
                                @endrole
                                <li><a href="{{route('admin.categories.index')}}">Danh sách</a></li>
                            </ul>
                        </li>
                        
                        <li class="sub-menu">
                            <a class="@yield('branch-active')" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Thương hiệu sản phẩm</span>
                            </a>
                            <ul class="sub">
                                @role('Content|Admin')
                                <li><a href="{{route('admin.branches.create')}}">Thêm mới</a></li>
                                @endrole
                                <li><a href="{{route('admin.branches.index')}}">Danh sách</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="@yield('product-active')" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Sản phẩm</span>
                            </a>
                            <ul class="sub">
                                @role('Content|Admin')
                                <li><a href="{{route('admin.products.create')}}">Thêm mới</a></li>
                                @endrole
                                <li><a href="{{route('admin.products.index')}}">Danh sách</a></li>
                            </ul>
                        </li>
                        @hasanyrole('Sale|Admin')
                        <li class="sub-menu">
                            <a class="@yield('order-active')" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Quản lý đơn hàng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('admin.orders.index')}}">Danh sách</a></li>
                            </ul>
                        </li>
                        @endhasanyrole
                        @endhasanyrole
                        
                        @role('Admin')
                        <li class="sub-menu">
                            <a class="@yield('user-active')" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Quản trị viên</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('admin.users.create')}}">Thêm mới</a></li>
                                <li><a href="{{route('admin.users.index')}}">Danh sách</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a class="@yield('role-active')" href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Quyền quản trị</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{route('admin.roles.create')}}">Thêm mới</a></li>
                                <li><a href="{{route('admin.roles.index')}}">Danh sách</a></li>
                            </ul>
                        </li>
                        @endrole
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
            <!-- footer -->
            <!-- <div class="footer">
                <div class="wthree-copyright">
                    <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
                </div>
            </div> -->
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>
    <script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>
    <script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('backend/js/flot-chart/excanvas.min.js')}}"></script><![endif]-->
    <script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
    <!-- calendar -->
    <!-- <script type="text/javascript" src="{{asset('backend/js/monthly.js')}}"></script> -->
    <!-- <script type="text/javascript">
    $(window).load(function() {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch (window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    }); -->
    </script>
    <!-- ckeditor -->
    <script src="{{asset('backend/ckeditor/ckeditor.js')}}"></script>
    <!-- //calendar -->
    <!-- jquery validation -->
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="{{asset('backend/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('backend/js/additional-methods.min.js')}}"></script>
    @yield('javascript')
</body>

</html>