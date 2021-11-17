<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <script src="https://code.jquery.com/jquery-3.5.0.js"></script> -->

    <!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{ asset('images/img/fast-food.png') }}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
	<!-- main style -->
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body>
    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="{{ route('home') }}">
								<img src="{{ asset('images/img/logoF.png') }}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="{{ route('home') }}">Static Home</a></li>
										<li><a href="#">Slider Home</a></li>
									</ul>
								</li>
								<!-- <li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="#">404 page</a></li>
										<li><a href="#">About</a></li>
										<li><a href="#">Cart</a></li>
										<li><a href="#">Check Out</a></li>
										<li><a href="#">Contact</a></li>
										<li><a href="#">News</a></li>
										<li><a href="#">Shop</a></li>
									</ul>
								</li> -->
								<li><a href="#">News</a>
									<ul class="sub-menu">
										<li><a href="#">News</a></li>
										<li><a href="#">Single News</a></li>
									</ul>
								</li>
								<li><a href="#">Shop</a>
									<ul class="sub-menu">
										<li><a href="#">Shop</a></li>
										<li><a href="{{ route('index.get-inforcheckout') }}">Đã thanh toán</a></li>
                                        <li><a href="{{ route('index.bill') }}">Hoá đơn</a></li>
										<!-- <li><a href="#">Single Product</a></li> -->
										<li><a href="{{ route('index.cart') }}">Giỏ hàng</a></li>
									</ul>
								</li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">About</a></li>
                                @if (Route::has('login'))
                                    @auth
                                        <li>
                                            <a href="#">Tên đăng nhập: {{ Auth::user()->name }}</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('logout') }}">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li>
                                            <a href="#">Chưa đăng nhập</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                                                @if (Route::has('register'))
                                                    <li><a href="{{ route('register') }}">Đăng kí</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endauth
                                @endif
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="{{ route('index.cart') }}"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                    </div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
                            <form action="{{ route('search-product') }}" method="get">
                                @csrf
                                <input type="text" name="name" placeholder="Từ khoá">
                                <button type="submit">Tìm món <i class="fas fa-search"></i></button>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

    @yield('hero_area')

    @yield('features_list')

	@yield('content')

    @yield('cart_banner')

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="{{ asset('images/img/company-logos/1.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('images/img/company-logos/2.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('images/img/company-logos/3.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('images/img/company-logos/4.png') }}" alt="">
						</div>
						<div class="single-logo-item">
							<img src="{{ asset('images/img/company-logos/5.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">About us</h2>
						<p>Fastfood ược xây dựng để cho mọi người có thể tìm kiếm, đánh giá, bình luận các thức ăn nhanh, tiện lợi tại Việt Nam - từ website. Tất cả thành viên từ Bắc đến Nam, Fastfood kết nối những thực khách đến với các món ăn ngon.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Get in Touch</h2>
						<ul>
							<li>Hải phòng</li>
							<li>support@fastfood.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Pages</h2>
						<ul>
							<li><a href="{{ route('home') }}">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Shop</a></li>
							<li><a href="#">News</a></li>
							<li><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">Subscribe</h2>
						<p>Đăng ký mail ngay để nhận những cập nhật mới nhất</p>
						<form action="index.html">
							<input type="email" placeholder="Email">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; Công Ty Cổ Phần <a href="https://imransdesign.com/">Fastfood</a>.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- end copyright -->

	<!-- jquery -->
	<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
	<!-- count down -->
	<script src="{{ asset('js/jquery.countdown.js') }}"></script>
	<!-- isotope -->
	<script src="{{ asset('js/jquery.isotope-3.0.6.min.js') }}"></script>
	<!-- waypoints -->
	<script src="{{ asset('js/waypoints.js') }}"></script>
	<!-- owl carousel -->
	<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
	<!-- magnific popup -->
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
	<!-- mean menu -->
	<script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
	<!-- sticker js -->
	<script src="{{ asset('js/sticker.js') }}"></script>
	<!-- main js -->
	<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
