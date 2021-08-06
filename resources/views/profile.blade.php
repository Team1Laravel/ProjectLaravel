<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Font -->
<link
	href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700"
	rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" href="css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" href="css/nouislider.min.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="css/plyr.css">
<link rel="stylesheet" href="css/photoswipe.css">
<link rel="stylesheet" href="css/default-skin.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/input.css">
<link rel="stylesheet" href="css/button.css">
<!-- Favicons -->
<link rel="icon" type="image/png" href="icon/favicon-32x32.png"
	sizes="32x32">
<link rel="apple-touch-icon" href="icon/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="72x72"
	href="icon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114"
	href="icon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144"
	href="icon/apple-touch-icon-144x144.png">
<link rel="stylesheet"
	href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}">
<!-- Font Awesome CSS-->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom Font Icons CSS-->
<link rel="stylesheet" href="{{ asset('admin/css/font.css') }}">
<!-- Google fonts - Muli-->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
<!-- theme stylesheet-->
<link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}"
	id="theme-stylesheet">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('admin/css/style.edit.css') }}">


<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="Dmitry Volkov">
<title>Flix Go Online Movies, TV Shows & Cinema HTML Template</title>

</head>
<body class="body">
	<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <!-- header logo -->
                        <a href="{{route('home')}}" class="header__logo">
                            <img src="img/logo.svg" alt="">
                        </a>
                        <!-- end header logo -->
                        <!-- header nav -->
                        <ul class="header__nav">
                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuHome"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>

                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
                                    <li><a href="index.html">Home slideshow bg</a></li>
                                    <li><a href="index2.html">Home static bg</a></li>
                                </ul>
                            </li>
                            <!-- end dropdown -->

                            <!-- dropdown -->
                            <li class="header__nav-item">
                                <a class="dropdown-toggle header__nav-link" href="#" role="button"
                                   id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">Catalog</a>

                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                    <li><a href="catalog1.html">Catalog Grid</a></li>
                                    <li><a href="catalog2.html">Catalog List</a></li>
                                    <li><a href="details1.html">Details Movie</a></li>
                                    <li><a href="details2.html">Details TV Series</a></li>
                                </ul>
                            </li>
                            <!-- end dropdown -->

                            <li class="header__nav-item">
                                <a href="{{route('pricing')}}" class="header__nav-link">Pricing Plan</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="{{route('help')}}" class="header__nav-link">Help</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="{{route('about')}}" class="header__nav-link">About</a>
                            </li>
                        </ul>
                        <!-- end header nav -->

                        <!-- Right Side Of Navbar -->
                        <!-- header auth -->
                        <div class="header__auth">
                            <button class="header__search-btn" type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                            @guest
                                @if (Route::has('register'))
                                    <a href="{{route('register')}}" class="header__sign-up">
                                        <i class="icon ion-ios-add-circle"></i>
                                        <span>{{__('Register') }}</span>
                                    </a>
                                @endif
                                @if (Route::has('login'))
                                    <a href="{{route('login')}}" class="header__sign-in">
                                        <i class="icon ion-ios-log-in"></i>
                                        <span>{{__('Login') }}</span>
                                    </a>
                                @endif
                            @else
                             
                                <li class="header__nav-item ml-2">
                                    <a class="dropdown-toggle header__nav-link" href="#" role="button"
                                       id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">{{ Auth::user()->name }}
                                       
                                       </a>
                                       

                                    <ul class="dropdown-menu header__dropdown-menu"
                                        aria-labelledby="dropdownMenuCatalog">
                                        <li><a href="catalog1.html"><a
                                                    href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      class="d-none">
                                                    @csrf
                                                </form>
                                            </a></li>
                                            @php 
                                            	$id = "/profile/".Auth::user()->id;
                                            @endphp
                                        <li><a href="{{route('profile')}}" class="header__nav-link">Profile</a></li>
                                    </ul>
                                </li>

                            @endguest
                        </div>
                        <!-- end header auth -->

                        <!-- header menu btn -->
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- end header menu btn -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header search -->
    <form action="#" class="header__search">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" placeholder="Search for a movie, TV Series that you are looking for">

                        <button type="button">search</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
</header>
<!-- end header -->
	<section class="section  section--bg" data-bg="img/section/section.jpg"
		style="position: relative; z-index: 1; hight: 200px; margin-top: 65px;">
		<div class="container">
			<div class="avatar d-flex justify-content-center">
				@if(!empty(Auth::user()->image)) <img width="200px" height="200px;"
					src="{{Auth::user()->image}}" alt="..."
					class="img-fluid rounded-circle"
					style="position: relative; z-index: 2;"> @else
				<img width="200px" height="200px;"
					src="{{asset('img/users/no-image.png')}}" alt="..."
					class="img-fluid rounded-circle"
					style="position: relative; z-index: 2;"> @endif
			</div>
			<div style="text-align: center; color: white; font-family: Arial;">{{Auth::user()->name}}</div>

			<div id="demo1" class="collapse" style="margin-top: 15px;">
               <div class="text-input">
                  <input type="text" id="input1" placeholder="Try typing something in here!">
                  <label for="input1">Name</label>
                </div>
			</div>
			<div class="d-flex justify-content-center">
				<button type="button" class="btn btn-primary  "
					data-toggle="collapse" data-target="#demo"
					style="width: 300px; margin-top: 20px; text-align: center;">Update
					Profile</button>
			</div>
			<div id="demo" class="collapse" style="margin-top: 15px;">
				<div class="container">
					<div class="d-flex justify-content-center">

						<div class="col-md-8">
							<div class="card ">
								<div class="card-body">
									
									@if (session()->has('message'))
									<div class="alert alert-warning" style="text-align: center;">
										{{session()->get('message')}}</div>
									@endif
									<form action="{{ route('profile.capnhat')}}"
										enctype="multipart/form-data" method="post" class="" style ="positon:relative">
										@csrf @method('put') <input type="hidden" name="id"
											value="{{Auth::user()->id }}" />
										<div class="form-group ">
										<div class="text-input">
                                          <input type="text" id="input1" class="form-control @error('name') is-invalid @enderror"
													name="name" value="{{ Auth::user()->name }}" required
													autocomplete="username" autofocus>
                                          <label for="input1">Name</label>
                                          @error('name') <span class="invalid-feedback"
													role="alert"> <strong>{{ $message }}</strong>
												</span> @enderror
                                        </div>
                                        </div>

										<div class="form-group">
										<div class="text-input">
                                          <input type="text" id="input1" class="form-control @error('email') is-invalid @enderror"
													name="email" value="{{ Auth::user()->email }}" required
													autocomplete="email" readonly>
                                          <label for="input1">Email</label>
                                        </div>
                                        </div>
										
										<div class="form-group ">
										<div class="text-input">
                                          <input type="text" id="input1" class="form-control @error('password') is-invalid @enderror"
													name="password" autocomplete="new-password">
                                          <label for="input1">Password</label>
                                          @error('password') <span class="invalid-feedback"
													role="alert"> <strong>{{ $message }}</strong>
												</span> @enderror
                                        </div>
                                        </div>
										<div class="form-group ">
										<div class="text-input">
                                          <input type="text" id="input1" class="form-control @error('password') is-invalid @enderror"
													name="password" autocomplete="new-password">
                                          <label for="input1">Confirm Password</label>
                                          @error('password') <span class="invalid-feedback"
													role="alert"> <strong>{{ $message }}</strong>
												</span> @enderror
                                        </div>
                                        </div>




										<div class="form-group d-flex justify-content-center">


											<div class="file-upload">
												<button class="file-upload-btn" type="button"
													onclick="$('.file-upload-input').trigger( 'click' )">Add
													Image</button>

												<div class="image-upload-wrap">
													<input class="file-upload-input" name="image" id="image"
														type='file' value="{{ Auth::user()->image }}" onchange="readURL(this);" accept="image/*" />
													<div class="drag-text">
														<h3>Drag and drop a file or select add Image</h3>
													</div>
												</div>
												<div class="file-upload-content">
													<img class="file-upload-image" src="#" alt="your image" />
													<div class="image-title-wrap">
														<button type="button" onclick="removeUpload()"
															class="remove-image">
															Remove <span class="image-title">Uploaded Image</span>
														</button>
													</div>
												</div>
											</div>
										</div>

										<div id="errors-image"></div>

										<div class="d-flex justify-content-center">
											 <button class="button1" type="submit" >
                                              <span class="btn1">Submit</span>
                                             </button>
										</div>
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	</section>

	<!-- footer -->
	<footer style="background: #2b2b31;">
		<div class="container">
			<div class="row">
				<!-- footer list -->
				<div class="col-12 col-md-3">
					<h6 class="footer__title">Download Our App</h6>
					<ul class="footer__app">
						<li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg"
								alt=""></a></li>
						<li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Resources</h6>
					<ul class="footer__list">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Pricing Plan</a></li>
						<li><a href="#">Help</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-6 col-sm-4 col-md-3">
					<h6 class="footer__title">Legal</h6>
					<ul class="footer__list">
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Security</a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer list -->
				<div class="col-12 col-sm-4 col-md-3">
					<h6 class="footer__title">Contact</h6>
					<ul class="footer__list">
						<li><a href="tel:+18002345678">+1 (800) 234-5678</a></li>
						<li><a href="mailto:support@moviego.com">support@flixgo.com</a></li>
					</ul>
					<ul class="footer__social">
						<li class="facebook"><a href="#"><i class="icon ion-logo-facebook"></i></a></li>
						<li class="instagram"><a href="#"><i
								class="icon ion-logo-instagram"></i></a></li>
						<li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
						<li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
					</ul>
				</div>
				<!-- end footer list -->

				<!-- footer copyright -->
				<div class="col-12">
					<div class="footer__copyright">
						<small><a target="_blank" href="https://www.templateshub.net">Templates
								Hub</a></small>

						<ul>
							<li><a href="#">Terms of Use</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>
				<!-- end footer copyright -->
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<!-- JS -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.mousewheel.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.min.js"></script>
	<script src="js/wNumb.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/plyr.min.js"></script>
	<script src="js/jquery.morelines.min.js"></script>
	<script src="js/photoswipe.min.js"></script>
	<script src="js/photoswipe-ui-default.min.js"></script>
	<script src="js/main.js"></script>



</body>

</html>
