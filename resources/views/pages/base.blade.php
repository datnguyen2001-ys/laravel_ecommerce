@extends('layouts_page')
@section('content')
<div id="header-carousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach ($slider as $key =>$vlaue )
             @php
                $i++;
            @endphp
        <div class="carousel-item {{ $i == 1 ? 'active': ' '}}" style="height: 410px;">
            <img class="img-fluid" src="./public/uploads/<?= $vlaue->slider_image ?>" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 700px;">
                    <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $vlaue->slider_name }}</h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $vlaue->slider_desc }}</h3>
                    <a href="{{ url('/shop') }}" class="btn btn-light py-2 px-3">Shop Now</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
        </div>
    </a>
    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
        <div class="btn btn-dark" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
        </div>
    </a>
</div>
</div>
</div>
</div>
<!-- Navbar End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
<div class="row px-xl-5 pb-3">
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
    <h5 class="font-weight-semi-bold m-0">sản phẩm chất lượng</h5>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
    <h5 class="font-weight-semi-bold m-0">Miễn phí giao hàng</h5>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
    <h5 class="font-weight-semi-bold m-0">hoàn trả trong 14 ngày</h5>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 pb-1">
<div class="d-flex align-items-center border mb-4" style="padding: 30px;">
    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
    <h5 class="font-weight-semi-bold m-0">hỗ trợ 24/7  </h5>
</div>
</div>
</div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        
        @foreach ($cate_sta as $key => $value )
    
        <div class="col-lg-4 col-md-6 pb-1">
        <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
            {{-- <p class="text-right">15 Products</p> --}}
                <a href="" class="cat-img position-relative overflow-hidden mb-3">
                    <img style="height: 300px;width: 100%;object-fit: cover" class="img-fluid" src="./public/uploads/<?= $value->category_image ?>" alt="">
                </a>
                <h5 class="font-weight-semi-bold m-0">{{ $value->category_name}}</h5>
            </div>
        </div>
        @endforeach
    </div>
</div>
 
 


 
        <div class="container-fluid pt-5">
        <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">sản phẩm thời trang</span></h2>
        </div>
        <div class="row px-xl-5 pb-3">
                        @foreach ($pro as $key => $value )
                            
                    
                        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                <img class="img-fluid w-100" src="./public/uploads/<?= $value->product_image?>" alt="">
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3">
                                    <a href="{{ url('/product_details/'. $value->product_id) }}">
                                    
                                        {{ $value->product_name }}
                                    </a>
                                
                                </h6>
                                <div class="d-flex justify-content-center">
                                    <h6>
                                    <?php  
                                        $p = $value->product_price;
                                        echo number_format(($p),0,',','.').' '.'đ';    
                                    ?>    
                                    </h6> 
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <form action="">
                                    @csrf
                                <p  class="btn btn-sm text-dark p-0 view-data"  id="{{ $value->product_id}}"  ><i class="fas fa-eye text-primary mr-1"></i>Xem nhanh</p>
                            </form>
                                <form action="">
                                    @csrf
                                    <input type="hidden" name="" class="pro_id_{{ $value->product_id }}" value="{{ $value->product_id  }}">
                                    <input type="hidden" name="" class="pro_name_{{ $value->product_id }}" value="{{ $value->product_name  }}">
                                    <input type="hidden" name="" class="pro_image_{{ $value->product_id }}" value="{{ $value->product_image  }}">
                                    <input type="hidden" name="" class="pro_price_{{ $value->product_id }}" value="{{ $value->product_price  }}">
                                
                                    <input type="hidden" name="" class="pro_quantity_{{ $value->product_id }}" value="{{ $value->product_quantity  }}">
                                    <input style="height: 50px" type="hidden" value="1" min="1" name="" class="pro_qty_{{ $value->product_id }}" >
                                    <input type="hidden" class="check" value="{{ Auth::check() ? 1 : 0 }}">
                                    <p  data-id="{{ $value->product_id }}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</p>
                                </form>
                            </div>
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        

            <div id="dataModal" class="modal fade">  
                <div class="modal-dialog">  
                    <div class="modal-content">  
                        <div class="modal-header">  
                            <h4 class="modal-title">Thông Tin sản phẩm</h4>  
                            <button type="button" class="close" data-dismiss="modal">&times;</button>  
                        </div>  
                        <div class="modal-body" id="product_detail">  
                        </div>  
                        <div class="modal-footer">  
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                
                        </div>  
                    </div>  
                </div>  
        </div>  

                            <div class="container-fluid bg-secondary my-5">
                            <div class="row justify-content-md-center py-5 px-xl-5">
                            <div class="col-md-6 col-12 py-5">
                            <div class="text-center mb-2 pb-2">
                                <h2 class="section-title px-5 mb-3"><span class="bg-secondary px-2">Stay Updated</span></h2>
                                <p>Amet lorem at rebum amet dolores. Elitr lorem dolor sed amet diam labore at justo ipsum eirmod duo labore labore.</p>
                            </div>
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control border-white p-4" placeholder="Email Goes Here">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary px-4">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            </div>
                            </div>
                            <!-- Subscribe End -->


                            <!-- Products Start -->
                            <div class="container-fluid pt-5">
                            <div class="text-center mb-4">
                            <h2 class="section-title px-5"><span class="px-2">Sản phẩm mới ra mắt</span></h2>
                            </div>
                            <div class="row px-xl-5 pb-3">
                                @foreach ($pro1 as $key => $value )
                                                
                                        
                                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="./public/uploads/<?= $value->product_image?>" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3">
                                            <a href="{{ url('/product_details/'. $value->product_id) }}">
                                            
                                                {{ $value->product_name }}
                                            </a>
                                        
                                        </h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>
                                            <?php  
                                                $p = $value->product_price;
                                                echo number_format(($p),0,',','.').' '.'đ';    
                                            ?>    
                                            </h6> 
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <form action="">
                                            @csrf
                                        <p  class="btn btn-sm text-dark p-0 view-data"  id="{{ $value->product_id}}"  ><i class="fas fa-eye text-primary mr-1"></i>Xem nhanh</p>
                                    </form>
                                        <form action="">
                                            @csrf
                                            <input type="hidden" name="" class="pro_id_{{ $value->product_id }}" value="{{ $value->product_id  }}">
                                            <input type="hidden" name="" class="pro_name_{{ $value->product_id }}" value="{{ $value->product_name  }}">
                                            <input type="hidden" name="" class="pro_image_{{ $value->product_id }}" value="{{ $value->product_image  }}">
                                            <input type="hidden" name="" class="pro_price_{{ $value->product_id }}" value="{{ $value->product_price  }}">
                                        
                                            <input type="hidden" name="" class="pro_qty_{{ $value->product_id }}" value="1">
                                            <p  data-id="{{ $value->product_id }}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</p>
                                        </form>
                                    </div>
                            </div>
                            </div>
                            @endforeach


                            </div>
                            </div>
                            @endsection