@php 
  $category = categories(); 
  $subcategory = subcategories(); 
  // dd( $sitesetting);
@endphp

<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8" />
  <meta name="description" content="Vinaika Template" />
  <meta name="keywords" content="Vinaika, unica, creative, html" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="csrf-token" content="psq8olwBXSDwtv5FuFNL7aXE5g8QXzX9kOx6haHA" />
  <title>Vinaika Jaipur</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('uploads/sitesetting/'.$sitesetting->fav_image)}}">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
    rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,700&amp;display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="{{asset('fronted/html/fonts/icomoon/style.css')}}" />
  <!-- Css Styles -->
  <link href="{{asset('fronted/lib/animate/animate.min.html') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/bootstrap.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/font-awesome.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/elegant-icons.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/magnific-popup.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/nice-select.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/owl.carousel.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/slicknav.min.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/style.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/lib/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/html/css/custom.css') }}" type="text/css" />
  <link rel="stylesheet" href="{{asset('fronted/js/Vendor/fancybox/jquery.fancybox.css') }}" />
  <link rel="stylesheet" href="{{asset('fronted/js/Vendor/fancybox/helpers/jquery.fancybox-thumbs.css') }}" />
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>
  <a id="button"></a>

  <div id="myModalsubscribe" class="modal fade subscribe">
    <div class="modal-dialog">
      <div class="modal-content">
        <button type="button" class="close2" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <div class="modal-body">
          <div class="row m-0">
            <div class="col-md-6 p-0 position-relative">
              <div class="newslettermodal-img">
                <img onerror="" src="{{asset('fronted/html/img/popup-img.jpg') }}" alt="" title="" class="img-fluid" />
              </div>
            </div>
            <div class="col-md-6 p-0">
              <div class="newslettermodal-content">
                <div class="text-center">
                  <img onerror="" src="{{asset('fronted/html/img/logo.png') }}" alt="" title="" />
                </div>
                <h4 class="modal-title">Sign up our newsletter</h4>
                <p>
                  Enter Your email address to sign up to receive our latest
                  news and offers
                </p>
                <form action="https://vinaikajaipur.com/" method="post" id="homeForm" onSubmit="return ajaxmailhome();"
                  class="newslettermodal-content-form">
                  <div class="form-group">
                    <input type="email" name="homemail" id="homemail" class="form-control"
                      placeholder="Enter Your e-mail address" />
                  </div>
                  <button type="button" class="btn-product btn--animated w-100" onClick="return ajaxmailhome();">
                    Subscribe
                  </button>
                </form>
                <ul>
                  <li>
                    <a href="#" class="icoRss" title=""><i class="fa fa-rss"></i></a>
                  </li>
                  <li>
                    <a href="#" class="icoFacebook" title=""><i class="fa fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#" class="icoTwitter" title=""><i class="fa fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#" class="icoGoogle" title=""><i class="fa fa-google-plus"></i></a>
                  </li>
                  <li>
                    <a href="#" class="icoLinkedin" title=""><i class="fa fa-linkedin"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="header__top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-7">
              <div class="header__top__left">
                <p>
                  <marquee width="100%" direction="left" scrollamount="3" height="20px">
                    Get up to 60% Off | Addl. 10% Off on your first purchase,
                    min order ₹999; Use Code: JKNEW10 | Addl. 10% on prepaid
                    orders | Free shipping on orders above ₹599
                  </marquee>
                </p>
              </div>
            </div>
            <div class="col-lg-6 col-md-5">
              <div class="header__top__right">
                @auth
                <div class="header__top__links">
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
                </div>
                @else
                <div class="header__top__links">
                  <a href="{{route('login')}}" class="">Login</a>
                </div>
                <div class="header__top__links">
                  <a href="{{route('register')}}" class="">Register</a>
                </div>
                @endauth
                {{-- <div class="header__top__currency">
                  <select>
                    <option value="">₹ INR</option>
                    <option value="">$ USD</option>
                    <option value="">$ SGD</option>
                  </select>
                </div> --}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="site-navbar-top">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-4 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <div class="site-logo">
                <a href="{{route('home')}}" class=""><img onerror="" src="{{asset('uploads/sitesetting/'.$sitesetting->logo)}} " style="height: 100px"
                    alt="Vinaika" /></a>
              </div>
            </div>

            <div class="col-8 col-md-8 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <!-- <li><a href="#"><span class="icon icon-person"></span></a></li> -->
                  <li>
                    <a href="javascript:void(0)" class="search-icon">
                      <span class="icon icon-search"></span>
                    </a>
                  </li>
                  <li>
                    <a href="wishlist.html"><span class="icon icon-heart-o"></span></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)" class="site-cart js-show-cart">
                      <span class="icon icon-shopping_cart"></span>
                      @auth
                        <span class="count" id="totalqty">{{totalqty()}}</span>
                        @else
                        <span class="count">0</span>
                      @endauth
                    </a>
                  </li>
                  <li class="d-inline-block d-md-none ml-md-0">
                    <a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="search-wrapper">
            <div class="container">
              <div class="search_flex">
                <form action="#" class="site-block-top-search">
                  <span class="icon icon-search2"></span>
                  <input type="text" class="form-control border-0" placeholder="Search" />
                </form>
                <a href="javascript:void(0);" class="search-cancel"><span class="icon icon-cancel"></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="site-navigation text-right text-md-center sticky-top" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="{{route('home')}}">Home</a></li>
            @foreach ($category as $categories)
            <li><a href="{{ route('category',['id'=>base64_encode($categories->id),'type'=>'category']) }}">{{$categories->name}}</a></li>
            @endforeach
            <li><a href="new-contact.html">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>
    @yield('fronted')
    <footer class="footer" style="background-color: #ed1e79">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="footer__logo text-center site-logo">
                <a href="index-2.html" class="js-logo-clone"><img onerror="" src="{{asset('uploads/sitesetting/'.$sitesetting->logo)}}" alt="Vinaika" /></a>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer__widget">
                <h6>CUSTOMER SERVICE</h6>
                <div class="addresFooterOption">
                  {{-- <div class="addressFooterInner">
                    <i class="fa fa-clock-o"></i>
                    <p>MON-FRI - 10.00 AM TO 7.00 PM (IST)</p>
                  </div> --}}
  
                  <div class="addressFooterInner">
                    <i class="fa fa-phone"></i>
                    <p><a href="tel:(+91)%209314966969">(+91) {{$sitesetting->contact_no}}</a></p>
                  </div>
  
                  <div class="addressFooterInner">
                    <i class="fa fa-map-marker"></i>
                    <p>
                     {{ $sitesetting->address }}
                    </p>
                  </div>
                  <div class="addressFooterInner">
                    <i class="fa fa-envelope"></i>
  
                    <p>
                      <a href="mailto:customercare@jaipurkurti.com">{{ $sitesetting->email }}</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="footer__widget">
                <h6>INFORMATION</h6>
                <ul>
                  @foreach ($category as $singlecat)
                  <li><a href="{{route('category',['id'=>base64_encode($singlecat->id),'type'=>'category'])}}">{{$singlecat->name}}</a></li>
                  @endforeach
                  {{-- <li><a href="my-account.html">MY ACCOUNT</a></li>
                  <li><a href="login.html">TRACK ORDER</a></li>
                  <li><a href="new-privacy-policy.html">PRIVACY POLICY</a></li> --}}
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="footer__widget">
                <h6>Sub Category</h6>
                <ul>
                  @foreach ($subcategory as $singlesub)
                  <li><a href="{{route('category',['id'=>base64_encode($singlesub->id),'type'=>'subcategory'])}}">{{$singlesub->name}}</a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="footer__widget">
                <h6>STAY CONNECTED</h6>
                <div class="footer__newslatter">
                  <form action="#">
                    <input type="text" placeholder="Your email" />
                    <button type="submit">
                      <span class="icon_mail_alt"></span>
                    </button>
                  </form>
                  <ul class="social-icon">
                    <li>
                      <a href="#">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa fa-youtube" aria-hidden="true"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <div class="footer__copyright__text">
                <p>
                  All Rights Reserved - 2022, VINAIKA | Powered
                  <i class="fa fa-heart-o" aria-hidden="true"></i> by
                  <a href="https://dzoneindia.co.in/" target="_blank">Dzone India</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- Footer Section End -->
  
      <!-- Search Begin -->
      <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-switch">+</div>
          <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here....." />
          </form>
        </div>
      </div>
      <!-- Search End -->
  
      <!-- signup form popup -->
      <div class="sign__popup__form">
        <div class="signin-overlay"></div>
        <div class="offcanvas-menu-wrapper2">
          <div class="offcanvas__option2">
            <div class="text-right d-flex align-items-center justify-content-sm-between">
              <h5>My Account</h5>
              <div class="js_close-btn close__icon">+</div>
            </div>
  
            <form id="loginform">
              <input type="hidden" name="_token" value="psq8olwBXSDwtv5FuFNL7aXE5g8QXzX9kOx6haHA" />
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp"
                  placeholder="Enter email" />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword1" placeholder="Password" />
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn product__btn signin_btn">
                Login
              </button>
              <div class="mb-20 mt-10 text-center">
                <a href="forgot.html" class="forgot_password">Forgot Your Password?</a>
              </div>
              <div class="text-center mb-20">
                <span>OR</span>
              </div>
              <button class="loginBtn loginBtn--facebook">
                Login with Facebook
              </button>
  
              <button class="loginBtn loginBtn--google mb-20">
                Login with Google@
              </button>
              <a href="new-register.html" class="btn product__btn signin_btn">Sign up Now!</a>
            </form>
          </div>
        </div>
      </div>
      <!-- Cart popup -->
      <div class="wrap-header-cart js-panel-cart">
        <div class="header-cart flex-col-l p-l-20 p-r-20">
          <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <h5>Your Cart</h5>
            <div class="js-hide-cart close__icon">+</div>
          </div>
          @auth
            <div class="header-cart-content flex-w js-pscroll">
              <div class="shopping__cart__table">
                <table>
                  <tbody>
                    @php
                      $items = cartitem();
                      $totalamount = 0;
                      //dd($items);
                      // echo '<pre>';
                      //   print_r($items);
                      // echo '</pre>';
                    @endphp
                    @foreach ($items as $cartitem)
                    @php 
                    $totalamount += $cartitem->price*$cartitem->qty;
                    @endphp
                    <tr>
                      <td>
                        <div class="product__cart__item d-flex align-items-center basis-50">
                              <div class="product__cart__item__pic" style="width: 150px;">
                                  <img src="{{asset('uploads/products/'.$cartitem->image)}}">
                              </div>
                              <div class="product__cart__item__text">
                                  <h6>{{$cartitem->qty}} X {{$cartitem->name}}</h6>
                                  <h5>{{currencysym($cartitem->price)}}</h5>
                              </div>
                          </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
    
              <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                  Total: ₹<span class="total_cart">{{$totalamount}}</span>
                </div>
    
                <div class="header-cart-buttons flex-w w-full">
                  <a href="{{route('cart')}}" class="btn-product btn--animated size-107 m-r-8">
                    View Cart
                  </a>
                  <a href="{{route('checkout')}}" class="btn-product btn--animated size-107">
                    Check Out
                  </a>
                </div>
              </div>
            </div>
            @else
            
          @endauth

        </div>
      </div>
    </div>
  
  
    <!-- Js Plugins -->
    <script src="{{asset('fronted/html/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('fronted/html/lib/wow/wow.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/jquery.countdown.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/jquery.slicknav.js') }}"></script>
    <script src="{{asset('fronted/html/js/mixitup.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/owl.carousel.min.js') }}"></script>
    <script src="{{asset('fronted/html/js/main.js') }}"></script>
    <script src="{{asset('fronted/html/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('fronted/js/Vendor/fancybox/jquery.fancybox.js') }}"></script>
    <script src="{{asset('fronted/html/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  
    <!-- Swiper Slider Init -->
  @yield('scripts')
  <script>
    $(document).ready(function () {
        $("a.grouped_elements").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 600,
            'speedOut': 200,
            'overlayShow': false
        });
    });    
</script>
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
        },
      });
    </script>
    <script>
      var swiper = new Swiper(".blogSwiper", {
        slidesPerView: 1,
        spaceBetween: 10,
        clickable: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,        
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 10,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 10,
          },
        },
      });
    </script>
  
    <script>
      $(".search-icon").click(function () {
        $(".search-wrapper").toggleClass("open");
        $("body").toggleClass("search-wrapper-open");
      });
      $(".search-cancel").click(function () {
        $(".search-wrapper").removeClass("open");
        $("body").removeClass("search-wrapper-open");
      });
    </script>
    <script>
      // Initiate the wowjs
      new WOW().init();
    </script>
    <script>
      $(".js-pscroll").each(function () {
          $(this).css("position", "relative");
          $(this).css("overflow", "hidden");
          var ps = new PerfectScrollbar(this, {
              wheelSpeed: 1,
              scrollingThreshold: 1000,
              wheelPropagation: false,
          });

          $(window).on("resize", function () {
              ps.update();
          });
      });
  </script>
  </body>
  
  </html>