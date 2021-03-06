<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hummer</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('public/frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('public/frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/sweetalert.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="">Support</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
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
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="{{ url('/index') }}" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"> Hummers</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="{{ url('/search-product') }}" method="GET" autocomplete="off" >
                          @csrf
                    <div class="input-group">
                        <input type="text"  name="key" id="key" class="form-control key" placeholder="Nh???p t??n s???n ph???m">
                        <div id="list-item"></div>
                       <input value="t??m ki???m" type="submit" value="" class="search-product btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a>
                <a href="{{ url('/show-cart') }}" class=" btn border count_cart">
                   
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Danh m???c s???n ph???m</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a >
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                         @foreach ($cate as $key =>$val )
                             
                         <a href="{{url('/category-byId/'.$val->category_id)   }}" class="nav-item nav-link"> {{ $val->category_name }}</a>
                         @endforeach
                         
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ url('/index') }}" class="nav-item nav-link active">Trang ch???</a>
                            
                             
                            <a href="{{ url('/shop') }}" class="nav-item nav-link">C???a h??ng</a>
                            <a href="#" class="nav-item nav-link">B??? s??u t???p</a>
                            <a href="{{ url('/blog') }}" class="nav-item nav-link">Tin t???c</a>
                            <a href="{{ url('/contact') }}" class="nav-item nav-link">Li??n h???</a>
                            
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <?php  
                            $email = Session::get('email');
                                if (isset($email )) {
                                    ?>
                                     <div class="dropdown">
                                        <p style="margin-top: 15px"  class="  dropdown-toggle" data-toggle="dropdown">
                                            <span class="d-none d-lg-inline-flex">

                               
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            
                                        </span>
                                        </p>
                                        <div style="left:-60px"  class="dropdown-menu">
                                           
                                          <a class="dropdown-item" href="#">l???ch s??? ????n h??ng</a>
                                          <a class="dropdown-item" href="{{ url('/logout') }}">
                                            ????ng xu???t
                                          </a>
                                        </div>
                                      </div>

                                      
                                    <?php
                                }else{
                                    ?>
                                        <a href="{{ url('/login_cus') }}" class="nav-item nav-link">????ng nh???p</a>
                                        <a href="{{ url('/register_cus') }}" class="nav-item nav-link">????ng k??</a>
                                    <?php
                                }   
                            ?>
                        </div>
                    </div>
                </nav>
            
               @yield('content')
            
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"> Hummers</h1>
                </a>
                @foreach ( $contact as $key => $value )
                    
                <p>gi??? m??? c???a: {{$value->contact_time  }}</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>{{$value->contact_address  }}</p>
                <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>{{$value->contact_email  }}</p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+{{$value->contact_phone  }}</p>
                @endforeach
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.html"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.html"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.html"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('public/frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('public/frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{ asset('public/frontend/mail/contact.js')}}"></script>
    <script src="{{ asset('public/frontend/js/sweetalert.js')}}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('public/frontend/js/main.js')}}"></script>
    

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
                
            $(document).ready(function(){
                $('#key').keyup(function(){
                    var key_word = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    if (key_word != '') {
                        $.ajax({
                            url:'{{ url('/search-autocomplete') }}',
                            method:'POST',
                            data:{
                                key_word:key_word,
                                _token:_token,
                            },
                            success:function(data){
                                $('#list-item').fadeIn();
                                $('#list-item').html(data);
                            }
                        });
                    }else{
                        $('#list-item').fadeOut();
                    }
                });

                $(document).on('click','.li_search',function(){
                    $('#key').val($(this).text());
                    $('#list-item').fadeOut();
                })




                $('.view-data').click(function(){
                    var id = $(this).attr('id');
                    var _token = $('input[name="_token"]').val();
                   
                    $.ajax({
                        url:'{{ url('/modal-view') }} ',
                        method:'POST',
                        data:{
                            id:id,
                            _token:_token,
                        },
                        success:function(data){
                            $('#product_detail').html(data);
                            $('#dataModal').modal('show');
                        }
                });
            });
                $('.add-to-cart').click(function(){
                    var value = $('.check').val();
                
                if (value == 0) {
                    window.location.href = "{{url('/login_cus')}}";
                }else{
                    var id = $(this).data('id');
                     var cart_product_id =  $('.pro_id_' + id).val();
                     var cart_product_name = $('.pro_name_' + id).val();
                     var cart_product_image = $('.pro_image_' + id).val();
                     var cart_product_price = $('.pro_price_' + id).val();
                     var cart_product_qty = $('.pro_qty_' + id).val();
                     var cart_product_quantity = $('.pro_quantity_' + id).val();
                     var _token = $('input[name="_token"]').val();
                   if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)   ){
                     alert('vui long dat lai so luong ');
                   }else{
                    $.ajax({
                        url:'{{ url('/save-cart') }} ',
                        method:'POST',
                        data:{
                            cart_product_id:cart_product_id,
                            cart_product_name:cart_product_name,
                            cart_product_image:cart_product_image,
                            cart_product_price:cart_product_price,
                            cart_product_qty:cart_product_qty,
                            cart_product_quantity:cart_product_quantity,
                            _token:_token
                        },
                        success:function(){
    
                        swal({
                                title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                text: "Xem ti???p ho???c ?????n gi??? h??ng",
                                showCancelButton: true,
                                cancelButtonText: "Xem ti???p",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "??i ?????n gi??? h??ng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/show-cart')}}";
                            });
                            show_cart();
                        }
                     });
                   }
                   
    
                }
                    
                });
            });
        </script>
</body>

</html>