<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>سامانه</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.all.min.css') }}">
    <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}"/>
    @yield('styles')
    <style>
        body {
            direction: rtl;
            text-align:right
        }

        dd {
            margin-right: 0;
        }

        figure {
            margin: 0 0 1rem;
        }

        caption {
            text-align: right;
        }

        th {
            text-align: right;
        }

        .form-check-inline + .form-check-inline {
            margin-right: .75rem;
        }

        .form-inline .form-check-label {
            padding-right: 0;
        }

        .btn-group .btn + .btn,
        .btn-group .btn + .btn-group,
        .btn-group .btn-group + .btn,
        .btn-group .btn-group + .btn-group {
            margin-right: -1px;
        }


        .btn-toolbar > .btn,
        .btn-toolbar > .btn-group,
        .btn-toolbar > .input-group {
            margin-right: 0.5rem;
        }

        .btn-group > .btn:first-child {
            margin-right: 0;
        }

        .btn-group > .btn-group {
            float: right;
        }

        .btn + .dropdown-toggle-split::after {
            margin-right: 0;
        }


        .btn-group-vertical > .btn + .btn,
        .btn-group-vertical > .btn + .btn-group,
        .btn-group-vertical > .btn-group + .btn,
        .btn-group-vertical > .btn-group + .btn-group {
            margin-right: 0;
        }

        .input-group .form-control {
            float: left;
        }


        .form-control + .input-group-addon:not(:first-child) {
            border-left-width: medium;
            border-right: 0;
        }


        .input-group-btn > .btn + .btn {
            margin-right: -1px;
        }

        .input-group-btn:not(:last-child) > .btn,
        .input-group-btn:not(:last-child) > .btn-group {
            margin-left: -1px;
        }

        .input-group-btn:not(:first-child) > .btn,
        .input-group-btn:not(:first-child) > .btn-group {
            margin-right: -1px;
        }



        .custom-control + .custom-control {
            margin-right: 1rem;
        }


        .custom-controls-stacked .custom-control + .custom-control {
            margin-right: 0;
        }



        .nav-tabs .nav-item + .nav-item {
            margin-right: 0.2rem;
        }



        .nav-pills .nav-item + .nav-item {
            margin-right: 0.2rem;
        }

        .nav-stacked .nav-item + .nav-item {
            margin-right: 0;
        }


        @media (max-width: 543px) {
            .navbar-toggleable .navbar-nav .nav-item {
                margin-left: 10em;
            }
        }

        @media (max-width: 767px) {
            .navbar-toggleable-sm .navbar-nav .nav-item {
                margin-left: 0;
            }
        }

        @media (max-width: 991px) {
            .navbar-toggleable-md .navbar-nav .nav-item {
                margin-left: 0;
            }
        }

        .card-link + .card-link {
            margin-right: 1.25rem;
        }



        .page-item:first-child .page-link {
            margin-right: 0;
        }


        .alert-dismissible .close {
            left: -1rem;
        }


        .embed-responsive .embed-responsive-item,
        .embed-responsive iframe,
        .embed-responsive embed,
        .embed-responsive object,
        .embed-responsive video {
            right: 0;
        }



        .tooltip.tooltip-top .tooltip-arrow,
        .tooltip.bs-tether-element-attached-bottom .tooltip-arrow {
            right: 50%;
            margin-right: -5px;
        }

        .tooltip.tooltip-bottom .tooltip-arrow,
        .tooltip.bs-tether-element-attached-top .tooltip-arrow {
            right: 50%;
            margin-right: -5px;
        }


        .popover.popover-top .popover-arrow,
        .popover.bs-tether-element-attached-bottom .popover-arrow {
            right: 50%;
            margin-right: -11px;
        }

        .popover.popover-top .popover-arrow::after,
        .popover.bs-tether-element-attached-bottom .popover-arrow::after {
            margin-right: -10px;
        }

        .popover.popover-bottom .popover-arrow,
        .popover.bs-tether-element-attached-top .popover-arrow {
            right: 50%;
            margin-right: -11px;
        }

        .popover.popover-bottom .popover-arrow::after,
        .popover.bs-tether-element-attached-top .popover-arrow::after {
            margin-right: -10px;
        }

        @media all and (transform-3d), (-webkit-transform-3d) {
            .carousel-inner > .carousel-item.next,
            .carousel-inner > .carousel-item.active.right {
                right: 0;
            }

            .carousel-inner > .carousel-item.prev,
            .carousel-inner > .carousel-item.active.left {
                right: 0;
            }

            .carousel-inner > .carousel-item.next.left,
            .carousel-inner > .carousel-item.prev.right,
            .carousel-inner > .carousel-item.active {
                right: 0;
            }
        }

        .carousel-inner > .active {
            right: 0;
        }

        .carousel-inner > .next {
            right: 100%;
        }

        .carousel-inner > .prev {
            right: -100%;
        }

        .carousel-inner > .next.left,
        .carousel-inner > .prev.right {
            right: 0;
        }

        .carousel-inner > .active.left {
            right: -100%;
        }

        .carousel-inner > .active.right {
            right: 100%;
        }


        .carousel-control .icon-prev {
            right: 50%;
            margin-right: -10px;
        }

        .carousel-control .icon-next {
            left: 50%;
            margin-left: -10px;
        }



        @media (min-width: 544px) {
            .carousel-control .icon-prev {
                margin-right: -15px;
            }

            .carousel-control .icon-next {
                margin-left: -15px;
            }

        }

        body {
            overflow-x: hidden;
        }

        #wrapper {
            padding-left: 0;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled {
            padding-right: 250px;
        }

        #sidebar-wrapper {
            z-index: 1000;
            position: fixed;
            right: 250px;
            width: 0;
            height: 100%;
            margin-right: -250px;
            overflow-y: auto;
            -webkit-transition: all 0.5s ease;
            -moz-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
        }

        #wrapper.toggled #sidebar-wrapper {
            width: 250px;
        }


        #wrapper.toggled #page-content-wrapper {
            position: absolute;
            margin-right: 0px;
        }


        /* Sidebar Styles */

        .sidebar-nav {
            position: absolute;
            top: 0;
            width: 250px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sidebar-nav li {
            text-indent: 20px;
            line-height: 40px;
        }

        .sidebar-nav li a {
            display: block;
            text-decoration: none;
            color: #999999;
        }

        .sidebar-nav li a:hover {
            text-decoration: none;

            background: wheat;
        }

        .sidebar-nav li a:active, .sidebar-nav li a:focus {
            text-decoration: none;
        }

        .sidebar-nav>.sidebar-brand {
            height: 65px;
            font-size: 18px;
            line-height: 60px;
        }

        .sidebar-nav>.sidebar-brand a {
            color: #999999;
        }

        .sidebar-nav>.sidebar-brand a:hover {
            color: #fff;
            background: none;
        }

        @media(min-width:768px) {
            #wrapper {
                padding-left: 0;
            }
            #wrapper.toggled {
                padding-right: 250px;
            }
            #sidebar-wrapper {
                width: 0;
            }
            #wrapper.toggled #sidebar-wrapper {
                width: 250px;
            }

            #wrapper.toggled #page-content-wrapper {
                position: relative;
                margin-right: 0;
            }
        }
    </style>
</head>
<body class="{{ str_replace('.', '-', Route::currentRouteName()) }}">


		<div class="container-fluid">




{{--						<div class="d-flex justify-content-center mt-4">--}}
{{--							<p class="user-name mt-10">{{ unserialize(session()->get('authByOpenID'))["first_name"] }}</p>--}}
{{--						</div>--}}
{{--						<div class="d-flex justify-content-center mt-2">--}}
{{--							<p class="user-id">{{ unserialize(session()->get('authByOpenID'))["office_id"] }}</p>--}}
{{--						</div>--}}


                    <nav class="navbar navbar-expand navbar-dark" style="border-bottom-style: groove; height: 106px">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample02">
                            <img src="{{asset('images/sandogh.png')}}" alt="">
                            <ul>
                                <p style="color: #106239;font-weight: 700;
    size: 40px;
    line-height: 40px;
    right: 40%;
    position: absolute;">درگاه خدمات الکترونیکی صندوق بازنشستگی کشوری</p>
                            </ul>
                            <form class="form-inline my-2 my-md-0"> </form>
                        </div>
                    </nav>
                    <div id="wrapper" class="toggled">
                        <!-- Sidebar -->
                        <div id="sidebar-wrapper" style="border-left-style: inset;">
                            <ul class="sidebar-nav">
                                <li>
                                    <a href="{{url('payslip/create')}}">
                                        دریافت فیش حقوقی
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('lawrights/create')}}">
                                        دریافت حکم حقوقی
                                    </a>
                                </li>
                                <li><a href="{{url('pensionerrights/create')}}">
                                        حقوق بازنشستگان کشور
                                    </a>

                                </li>
                                <li><a href="{{url('payrolldeduction/create')}}">
                                        گواهی کسر از حقوق/اعتبارسنجی
                                    </a>
                                </li>
                                <li><a href="{{url('accountnumber/create')}}">
                                        خود اظهاری شماره حساب
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}">
                                        خروج
                                    </a>
                                </li>
                            </ul>
                        </div> <!-- /#sidebar-wrapper -->
                        <!-- Page Content -->

        		<div class="col py-3">
			    	<main>
        				@yield('content')
    				</main>
        </div>

</div>
        <footer class="text-center text-lg-start footer-nav fixed-bottom" style="background-color: #0000008C">
            <!-- Copyright -->
            <div class="text-center p-3" >
                کلیه حقوق این سامانه متعلق به شرکت پیشخوان ایرانیان است
            </div>
            <!-- Copyright -->
        </footer>


    <script src="{{ asset('vendor/jquery/js/jquery-3.2.1.min.js') }}"></script>
    @include('sweetalert::alert')
    <noscript><strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to
            continue.</strong></noscript>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
	<script>
	/*
	    swal.fire({
	        title: 'مطمئن هستید؟',
	        text: 'لطفا برای حذف این آیتم روی حذف کلیک کنید.',
	        icon: 'question',
	        showCancelButton: true,
	        confirmButtonColor: '#3085d6',
	        cancelButtonColor: '#d33',
	        confirmButtonText: 'بله، حذف شود!',
	        cancelButtonText: 'خیر، لغو!',
	        buttonsStyling: true
	    }).then((result) => {
	        if (result.isConfirmed) {
	            $(this).closest('form').off("submit").submit();
	        } else {
	            swal.fire('لغو شد', 'حذف انجام نشد!', 'error');
	        }
	    });
	    */
	</script>
	<script src="{{ asset(mix('js/app.js')) }}"></script>
	@yield('scripts')
</body>
</html>
