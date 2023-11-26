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
        .side-menu .accordion-button:focus {
            border: none;
            box-shadow: none;
        }
    </style>
</head>
<body class="{{ str_replace('.', '-', Route::currentRouteName()) }}">
	<div id="app">
    	<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
        	<nav class="navbar fixed-top shadow-sm header-nav">
            	<div class="container-fluid">
                	<ul class="navbar-nav">
                    	<li class="nav-item me-0 side-menu-toggle">
                        	<a class="nav-link" href="#"><i class="fas fa-bars side-menu-toggle-i"></i></a>
                    	</li>
                    	<li class="nav-item me-auto org-li">
                        	<p class="navbar-brand d-none d-lg-block pt-0" >اداره کل راه و شهرسازی استان همدان</p>
                    	</li>
                    	<li class="nav-item">
                        	<a class="nav-link" href="#">حساب کاربری</a>
                    	</li>
                	</ul>
                	<div class="side-menu">       
                    	<div class="p-3 mb-7 border-bottom row row-col-12">
							<div class="d-flex justify-content-center">
								<i class="fas fa-user-circle user-icon"></i>
							</div>
							<div class="d-flex justify-content-center mt-4">
								<p class="user-name mt-10">کاربر پیشخوان</p>
							</div>
							<div class="d-flex justify-content-center mt-2">
								<p class="user-id">79832564</p>
							</div>
                    	</div>
                    	<ul class="list-group">
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	صفحه اصلی
                            	</a>
                        	</li>
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	ایجاد نامه
                            	</a>
                        	</li>                        	
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	جستجوی نامه
                            	</a>
                        	</li>        
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	پاسخ نامه
                            	</a>
                        	</li>         
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	پیش نویس
                            	</a>
                        	</li> 
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	مدیریت تراکنش ها
                            	</a>
                        	</li> 
                        	<li class="list-group-item border-0">
                            	<a href="home"
                               	class="text-decoration-none link-dark{{-- $active_section == 'app' ? ' active' : '' --}}">
                               	 	خروج
                            	</a>
                        	</li>                        	                       	                       	               	                
							<?php /*
                            <div class="accordion">
                                <div class="accordion-item border-0">
                                    <button
                                        class="accordion-button py-2 px-3{{-- !in_array($active_section, ['products', 'varieties', 'reviews', 'categories', 'ancestors', 'attributes', 'brands']) ? ' collapsed' : '' --}}"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapseShop">
                                        <span class="fa fa-store-alt"></span>
                                        <span class="ms-1">مدیریت درخواست ها</span>
                                    </button>
                                    <div id="collapseShop"
                                         class="accordion-collapse collapse{{-- in_array($active_section, ['products', 'varieties', 'reviews', 'categories', 'ancestors', 'attributes', 'brands']) ? ' show' : '' --}}">
                                        <div class="accordion-body">
                                            <ul class="list-group">
                                                <li class="list-group-item border-0">
                                                    <a href="#"
                                                       class="text-decoration-none link-dark{{-- $active_section == 'varieties' ? ' active' : '' --}}">
                                                        ثبت درخواست
                                                    </a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <a href="#"
                                                        class="text-decoration-none link-dark{{-- $active_section == 'reviews' ? ' active' : '' --}}">
                                                    	ویرایش درخواست
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            */?>
                    	</ul>
                	</div>
            	</div>
        	</nav>
    	</header>
    	<main>
        	@yield('content')
    	</main>

<footer class="text-center text-lg-start footer-nav fixed-bottom">
  <!-- Copyright -->
  <div class="text-center p-3" >
	کلیه حقوق این سامانه متعلق به شرکت پیشخوان ایرانیان است    
  </div>
  <!-- Copyright -->
</footer>    	
	</div>

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