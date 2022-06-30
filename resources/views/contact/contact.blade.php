<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hummer</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('public/tmp/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/tmp/css/style.css') }}" type="text/css">
   
</head>

<body>
 
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">

        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
 
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li> <a class="text-dark" href="">FAQs</a></li>
                                <li><a class="text-dark" href="">Help</a></li>
                                <li> <a class="text-dark" href="">Support</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="text-dark pl-2" href="">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a   href="{{ url('/index') }}" class="text-decoration-none">
                            <h2   class="m-0 display-5 font-weight-semi-bold"> Hummers</h2>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ url('/index') }}" class="nav-item nav-link active">Trang chủ</a></li>
                            
                             
                            <li><a href="{{ url('/shop') }}" class="nav-item nav-link">Cửa hàng</a></li>
                            <li><a href="shop.html" class="nav-item nav-link">Bộ sưu tập</a></li>
                            <li><a href="{{ url('/blog') }}" class="nav-item nav-link">Tin tức</a></li>
                            <li><a href="{{ url('/contact') }}" class="nav-item nav-link">Liên hệ</a></li>
                        </ul>
                    </nav>
                    
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <a href="" class="btn border">
                            <i class="fas fa-heart text-primary"></i>
                            <span class="badge">0</span>
                        </a>
                        <a href="{{ url('/show-cart') }}" class=" btn border count_cart">
                           
                        </a>
                         
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
 
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories"  >
                        <div class="hero__categories__all" style="background: #C17A74">
                            <i class="fa fa-bars"></i>
                            <span>Danh mục sản phẩm</span>
                        </div>
                        <ul>
                            @foreach ($cate as $key =>$val )
                            <li><a href="{{url('/category-byId/'.$val->category_id)   }}" class="nav-item nav-link"> {{ $val->category_name }}</a></li>
                                
                            @endforeach
                             
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero__search">
                        <div class="hero__search__form" >
                            <form action="" method="GET" >
                                @csrf
                                <input type="text" placeholder="What do yo u need?">
                                <button  style="background: #C17A74" type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                         
                    </div>
                </div>

                <div style="display: flex" class="col-lg-2">
                    <?php  
                    $email = Session::get('email');
                        if (isset($email )) {
                            ?>
                                <div   class="header__top__right__language">
                                    <img src="img/language.png" alt="">
                                    <div style="font-size: 20px">{{ Auth::user()->name }} <span class="caret"></span></div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul class="parrent" style="width: 200px;">
                                        <li><a href="#">Lịch sử đơn hàng</a></li>
                                        <li><a href="{{ url('/logout') }}">Đăng xuất</a></li>
                                    </ul>
                                </div>
                            <?php 
                        }else{
                            ?>
                                <a style="color: #C17A74" href="{{ url('/login_cus') }}" class="nav-item ">Đăng nhập</a>
                                <a style="padding-left: 15px;color: #C17A74" href="{{ url('/register_cus') }}" class="nav-item ">Đăng kí</a>
                            <?php
                        }
                        ?>
                     
                    
                </div>
                
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/tmp/img/photo-1648737119359-510d4f551382.avif') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/index') }}">Trang chủ</a>
                            <span>liên hệ với chúng tôi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    @foreach ($con as $key => $value )
    <section class="contact spad">
        <div class="container">
            <div class="row">

                
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Số điện thoại</h4>
                        <p>{{ $value->contact_phone }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>{{ $value->contact_address }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>giờ mở cửa</h4>
                        <p>{{ $value->contact_time }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>{{ $value->contact_email }}</p>
                    </div>
                </div>
               
               



            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">
        <iframe
            src="<?= $value->contact_map ?>"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
         
    </div>

    @endforeach

    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Để lại lời nhắn</h2>
                    </div>
                </div>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea placeholder="Your message"></textarea>
                        <button type="submit" class="site-btn">Gửi Tin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a  href="{{ url('/index') }}" class="text-decoration-none">
                                <h2 style="padding-top: 15px" class="m-0 display-5 font-weight-semi-bold"> Hummers</h2>
                            </a>
                        </div>
                        <ul>
                            @foreach ($con as $key => $value )
                            <li>Địa chỉ: {{ $value->contact_address }}</li>
                            <li>số điện thoại: {{ $value->contact_phone }}</li>
                            <li>email: {{ $value->contact_email }}</li>
                                
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('public/tmp/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/tmp/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/tmp/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/tmp/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('public/tmp/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('public/tmp/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('public/tmp/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/tmp/js/main.js') }}"></script>
   
    <script type="text/javascript">
        show_cart();
                function show_cart(){
    
                    $.ajax({
                        url:'{{url('/count-cart')}}',
                        method:'GET',
                        success:function(data){
                            $('.count_cart').html(data);
                        }
                    });
                }
            
        </script>


</body>

</html>