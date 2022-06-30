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
                        <a href="index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ url('/index') }}" class="nav-item nav-link active">Trang chủ</a></li>
                            
                             
                            <li><a href="{{ url('/shop') }}" class="nav-item nav-link">Cửa hàng</a></li>
                            <li><a href="shop.html" class="nav-item nav-link">Bộ sưu tập</a></li>
                            <li><a href="{{ url('/blog') }}" class="nav-item nav-link">Tin tức</a></li>
                            <li><a href="contact.html" class="nav-item nav-link">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                         
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
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form" >
                            <form action="{{ url('/search-product') }}" method="GET" >
                                @csrf
                                <input type="text" placeholder="What do yo u need?">
                                <button  style="background: #C17A74" type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('public/tmp/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Tin tức</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/index') }}">Trang chủ</a>
                            <span>Tin tức</span>
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
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Danh mục bài viết</h4>
                            <ul>
                                <li><a href="#">All</a></li>
                                @foreach ($cate_blog as $key => $value)
                                <li><a href="{{ url('/blog-category/'.$value->category_blog_id ) }}">{{ $value->category_blog_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Bài viết gần đây</h4>
                            <div class="blog__sidebar__recent">
                                 
                                 @foreach ($blog as $key => $value )
                                 <a href="{{ url('/blog-details/'.$value->blog_id) }}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img style="height: 100px;width: 100px;object-fit: cover" src="../public/uploads/<?=  $value->blog_image ?>" alt="">
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
                <div class="col-lg-8 col-md-7 order-md-1 order-1">

                    @foreach ($blog1 as $key => $value )
                    <div class="blog__details__text">
                        <h2><?= $value->blog_name ?></h2>
                        <p> <?php $message = html_entity_decode($value->blog_desc, ENT_QUOTES); echo $message?></p>
                        <p> <?= $value->blog_content ?></p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                    



            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Các bài viết liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
               
                @foreach ($rt as $key => $value )
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="../public/uploads/<?= $value->blog_image?>" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{ $value->create_at }} </li>
                                
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
                        </div>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </section>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
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



</body>

</html>