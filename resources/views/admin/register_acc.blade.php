<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
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
      
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                            </a>
                            <h3>Đăng ký</h3>
                        </div>
                        <form action="{{ url('/register_save') }}" method="POST">
                            @csrf
                        
                        <div class="form-floating mb-3">
                            <input name="username" type="text" class="form-control" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Họ Tên</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Mật khẩu</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input name="phone" type="text" class="form-control" id="phone" placeholder="phone">
                            <label for="phone">Số điện thoại</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            
                            {{-- <a href="">Forgot Password</a> --}}
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Đăng ký</button>
                        <p class="text-center mb-0">Đã có tài khoản? <a href="{{ url('/login_admin') }}">Đăng nhập</a></p>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
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
    <script src="js/main.js"></script>
</body>

</html>