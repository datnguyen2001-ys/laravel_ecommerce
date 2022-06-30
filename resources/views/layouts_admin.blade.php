 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('public/backend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/backend/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('public/backend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('public/backend/css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
    
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="ms-3">
                        <h6 class="mb-0">
                            <?php 
                                 $mess = Session::get('admin_name');
                                    if ($mess) {
                                        echo $mess;
                                    }
                                    
                        ?>
                        </h6>
                       
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Danh mục sản phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_category') }}" class="dropdown-item">Thêm danh mục</a>
                            <a href="{{ url('/all_category') }} " class="dropdown-item">Quản lí danh mục </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Thương hiệu</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_brand') }}" class="dropdown-item">Thêm thương hiệu</a>
                            <a href="{{ url('/all_brand') }} " class="dropdown-item">Quản lí thương hiệu </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Sản phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_product') }}" class="dropdown-item">Thêm sản phẩm</a>
                            <a href="{{ url('/all_product') }} " class="dropdown-item">Quản lí sản phẩm </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Slider</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_slider') }}" class="dropdown-item">Thêm Slider</a>
                            <a href="{{ url('/all_slider') }} " class="dropdown-item">Quản lí Slider </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Mã giảm giá</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_coupon') }}" class="dropdown-item">Thêm giảm giá</a>
                            <a href="{{ url('/all_coupon') }} " class="dropdown-item">Quản lí giảm giá </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Vận chuyển</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_transport') }}" class="dropdown-item">Thêm vận chuyển</a>
                            <a href="{{ url('/all_transport') }} " class="dropdown-item">Quản lí vận chuyển </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown">Danh mục tin tức</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_category_blog') }}" class="dropdown-item">Thêm Danh mục</a>
                            <a href="{{ url('/all_category_blog') }} " class="dropdown-item">Quản lí Danh mục </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown"> tin tức</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_blog') }}" class="dropdown-item">Thêm  tin tức</a>
                            <a href="{{ url('/all_blog') }} " class="dropdown-item">Quản lí  tin tức </a>
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown"> liên hệ</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/add_contact') }}" class="dropdown-item">Thêm  liên hệ</a>
                            <a href="{{ url('/all_contact') }} " class="dropdown-item">Quản lí  liên hệ </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link  " data-bs-toggle="dropdown"> Đơn hàng</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            
                            <a href="{{ url('/all_order') }}" class="dropdown-item">Quản lí đơn hàng</a>
                             
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            {{-- <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> --}}
                            <span class="d-none d-lg-inline-flex">

                               
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">tài khoản</a>
                            <a href="#" class="dropdown-item">Settings</a>
                           
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                          
                        </div>
                    </div>
                    
                </div>
            </nav>
          @yield('content')
             
                {{-- <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                        </br>
                        Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/backend/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('public/backend/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('public/backend/js/main.js') }}"></script>
    <script src="  https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js" charset = "utf-8"></script>
                <script>
                        CKEDITOR.replace('product_content' );
                        CKEDITOR.replace('product_desc' );
                        CKEDITOR.replace('blog_content' );
                        CKEDITOR.replace('blog_desc' );
                </script>

    <script type="text/javascript">
        $(document).ready(function(){

          
            $('.change').on('change',function(){
                var id = $(this).val();

                var order_id = $(this).children(':selected').attr('id');
                var _token = $('input[name="_token"]').val();
               qty = [];
               $("input[name ='qty']").each(function(){
                    qty.push($(this).val());
               });
               pro_id = [];
               $("input[name ='pro_id']").each(function(){
                pro_id.push($(this).val());
               });

               $.ajax({
                    url:'{{ url('/update_order')}}',
                    
                    method:'POST',
                    data:{
                        id:id,
                        order_id:order_id,
                        qty:qty,
                        pro_id:pro_id,
                        _token:_token
                    },
                    
                    success:function(data){
                        alert('cập nhật trạng thái đơn hàng thành công')
                     }
                });
                 
           
            });

            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var id  = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if(action == 'thanhpho'){
                    result = 'huyen';
                }else{
                    result = 'xa';
                }
               
               
             $.ajax({
                    url:'{{ url('/select-address')}}',
                    
                    method:'POST',
                    data:{
                        action:action,
                        id:id,
                        _token:_token
                    },
                    
                    success:function(data){
                          $('#'+result).html(data);     
                     }
                });
            })
        });
    </script>
</body>

</html>