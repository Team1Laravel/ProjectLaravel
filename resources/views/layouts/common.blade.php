<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Font -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600%7CUbuntu:300,400,500,700" rel="stylesheet">
      <!-- CSS -->
      <link rel="stylesheet" href="{{asset("css/bootstrap-reboot.min.css")}}">
      <link rel="stylesheet" href="{{asset("css/bootstrap-grid.min.css")}}">
      <link rel="stylesheet" href="{{asset("css/owl.carousel.min.css")}}">
      <link rel="stylesheet" href="{{asset("css/jquery.mCustomScrollbar.min.css")}}">
      <link rel="stylesheet" href="{{asset("css/nouislider.min.css")}}">
      <link rel="stylesheet" href="{{asset("css/ionicons.min.css")}}">
      <link rel="stylesheet" href="{{asset("css/plyr.css")}}">
      <link rel="stylesheet" href="{{asset("css/photoswipe.css")}}">
      <link rel="stylesheet" href="{{asset("css/default-skin.css")}}">
      <link rel="stylesheet" href="{{asset("css/main.css")}}">
      <!-- Favicons -->
      <link rel="icon" type="image/png" href="{{asset("icon/favicon-32x32.png")}}" sizes="32x32">
      <link rel="apple-touch-icon" href="{{asset("icon/favicon-32x32.png")}}">
      <link rel="apple-touch-icon" sizes="72x72" href="{{asset("icon/apple-touch-icon-72x72.png")}}">
      <link rel="apple-touch-icon" sizes="114x114" href="{{asset("icon/apple-touch-icon-114x114.png")}}">
      <link rel="apple-touch-icon" sizes="144x144" href="{{asset("icon/apple-touch-icon-144x144.png")}}">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="author" content="Dmitry Volkov">
      <title>FlixGo � Online Movies, TV Shows & Cinema HTML Template</title>
   </head>
   <div id="fb-root"></div>
   <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1899783760291478";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
   </script>
   <body class="body">
      <!-- header -->
      <header class="header">
         <div class="header__wrap">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="header__content">
                        <!-- header logo -->
                        <a href="{{route('home')}}" class="header__logo">
                        <img src="{{ asset('img/logo.svg') }}" alt="">
                        </a>
                        <!-- end header logo -->
                        <!-- header nav -->
                        <ul class="header__nav">
                           <!-- dropdown -->
                           <li class="header__nav-item">
                              <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuHome"
                                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                              <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
                                 <li><a href="{{route('home')}}">Home slideshow bg</a></li>
                                 <li><a href="{{route('home')}}">Home static bg</a></li>
                              </ul>
                           </li>
                           <!-- end dropdown -->
                           <!-- dropdown -->
                           {{-- <li class="header__nav-item">
                              <a class="dropdown-toggle header__nav-link" href="#" role="button"
                                 id="dropdownMenuCatalog" data-toggle="dropdown" aria-haspopup="true"
                                 aria-expanded="false">Catalog</a>
                              <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuCatalog">
                                 <li><a href="catalog1.html">Catalog Grid</a></li>
                                 <li><a href="catalog2.html">Catalog List</a></li>
                                 <li><a href="details1.html">Details Movie</a></li>
                                 <li><a href="details2.html">Details TV Series</a></li>
                              </ul>
                           </li> --}}
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
                                 <li>
                                    <a href="catalog1.html"><a
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                       class="d-none">
                                       @csrf
                                    </form>
                                    </a>
                                 </li>
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
      @yield("content");
      <!-- footer -->
      <footer class="footer">
         <div class="container">
            <div class="row">
               <!-- footer list -->
               <div class="col-12 col-md-3">
                  <h6 class="footer__title">Download Our App</h6>
                  <ul class="footer__app">
                     <li><a href="#"><img src="img/Download_on_the_App_Store_Badge.svg" alt=""></a></li>
                     <li><a href="#"><img src="img/google-play-badge.png" alt=""></a></li>
                  </ul>
               </div>
               <!-- end footer list -->
               <!-- footer list -->
               <div class="col-6 col-sm-4 col-md-3">
                  <h6 class="footer__title">Resources</h6>
                  <ul class="footer__list">
                     <li><a href="{{route('about')}}">About Us</a></li>
                     <li><a href="{{route('pricing')}}">Pricing Plan</a></li>
                     <li><a href="{{route('help')}}">Help</a></li>
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
                     <li class="instagram"><a href="#"><i class="icon ion-logo-instagram"></i></a></li>
                     <li class="twitter"><a href="#"><i class="icon ion-logo-twitter"></i></a></li>
                     <li class="vk"><a href="#"><i class="icon ion-logo-vk"></i></a></li>
                  </ul>
               </div>
               <!-- end footer list -->
               <!-- footer copyright -->
               <div class="col-12">
                  <div class="footer__copyright">
                     <small><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></small>
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
      <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
      <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/owl.carousel.min.js')}}"></script>
      <script src="{{asset('js/jquery.mousewheel.min.js')}}"></script>
      <script src="{{asset('js/jquery.mCustomScrollbar.min.js')}}"></script>
      <script src="{{asset('js/wNumb.js')}}"></script>
      <script src="{{asset('js/nouislider.min.js')}}"></script>
      <script src="{{asset('js/plyr.min.js')}}"></script>
      <script src="{{asset('js/jquery.morelines.min.js')}}"></script>
      <script src="{{asset('js/photoswipe.min.js')}}"></script>
      <script src="{{asset('js/photoswipe-ui-default.min.js')}}"></script>
      <script src="{{asset('js/main.js')}}"></script>
      <script src="{{ asset('/admin/js/edit.js') }}"></script>
      @auth
      @include('buttonsubcribe')
      @include('chatsupport')
      @endauth
   </body>
</html>