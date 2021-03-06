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
                    <a   href="{{ url('/index') }}" class="text-decoration-none">
                        <h2 style="padding-top: 15px" class="m-0 display-5 font-weight-semi-bold"> Hummers</h2>
                    </a>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ url('/index') }}" class="nav-item nav-link active">Trang ch???</a></li>
                            
                             
                            <li><a href="{{ url('/shop') }}" class="nav-item nav-link">C???a h??ng</a></li>
                            <li><a href="shop.html" class="nav-item nav-link">B??? s??u t???p</a></li>
                            <li><a href="{{ url('/blog') }}" class="nav-item nav-link">Tin t???c</a></li>
                            <li><a href="{{ url('/contact') }}" class="nav-item nav-link">Li??n h???</a></li>
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
                            <span>Danh m???c s???n ph???m</span>
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
                                        <li><a href="#">L???ch s??? ????n h??ng</a></li>
                                        <li><a href="{{ url('/logout') }}">????ng xu???t</a></li>
                                    </ul>
                                </div>
                            <?php 
                        }else{
                            ?>
                                <a style="color: #C17A74" href="{{ url('/login_cus') }}" class="nav-item ">????ng nh???p</a>
                                <a style="padding-left: 15px;color: #C17A74" href="{{ url('/register_cus') }}" class="nav-item ">????ng k??</a>
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
                        <h2>Tin t???c</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/index') }}">Trang ch???</a>
                            <span>Tin t???c</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                            <form action="{{ url('/blog') }}" method="GET">
                                @csrf
                                <input name="key" type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh m???c b??i vi???t</h4>
                            <ul>
                               
                                @foreach ($cate_blog as $key => $value)
                                <li><a href="{{ url('/blog-category/'.$value->category_blog_id ) }}">{{ $value->category_blog_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>B??i vi???t g???n ????y</h4>
                            <div class="blog__sidebar__recent">
                                 
                                 @foreach ($blog as $key => $value )
                                 <a href="{{ url('/blog-details/'.$value->blog_id) }}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img style="height: 100px;width: 100px;object-fit: cover" src="./public/uploads/<?=  $value->blog_image ?>" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{  $value->blog_name }}</h6>
                                        <span>{{  $value->create_at }}</span>
                                    </div>
                                </a>
                                 @endforeach
                                 

                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        
                         
                         
                        @foreach ($blog1 as $key => $value )
                            
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img style="height: 350px;object-fit: cover" src="./public/uploads/<?=   $value->blog_image?>" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{  $value->create_at }}</li>
                                        
                                    </ul>
                                <h5 style= "display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;">
                                    <a href="{{ url('/blog-details/'.$value->blog_id) }}">{{  $value->blog_name }}</a>
                                </h5>
                                    <div style= "display: -webkit-box;
                                    -webkit-line-clamp: 2;
                                    -webkit-box-orient: vertical;
                                    overflow: hidden;">    
                                         <?php $message = html_entity_decode($value->blog_desc, ENT_QUOTES); echo $message?>
                                        
                                    </div>
                                    <a style="margin-top: 20px" href="{{ url('/blog-details/'.$value->blog_id) }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12">
                        {{ $blog1->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ url('/index') }}" class="text-decoration-none">
                                <h1 class="m-0 display-5 font-weight-semi-bold"> Hummers</h1>
                            </a>
                        </div>
                        <ul>
                            @foreach ( $contact as $key => $value )
                    
                            <li>open Time:{{$value->contact_time  }}</li>
                            <li class="mb-2">Address: {{$value->contact_address  }}</li>
                            <li class="mb-2">Email: {{$value->contact_email  }}</li>
                            <li class="mb-0">Phone: +{{$value->contact_phone  }}</li>
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