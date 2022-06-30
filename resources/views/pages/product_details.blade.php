@extends('layouts_pages')
@section('content1')
</div>
</div>
</div>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi tiết sản phẩm</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Cửa hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Shop Detail Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-5">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    @php
                        $i= 0
                    @endphp
                    @foreach ($pro as $key => $value )
                    @php
                        $i++;
                    @endphp
                    <div class="carousel-item {{$i == 1 ? 'active' :''  }}">
                        <img class="w-100 h-100" src="../public/uploads/<?=  $value->product_image?>" alt="Image">
                    </div>
                        
                    
                    @foreach ($img as $key => $imgs)
                        
                    <div class="carousel-item">
                        <img class="w-100 h-100" src="../public/uploads/<?= $imgs->image ?>" alt="Image">
                    </div>
                    @endforeach
                     
                   
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 pb-5">
          
            <h3 class="font-weight-semi-bold">{{ $value->product_name }}</h3>
            <div class="d-flex mb-3">
                <ul style="display: flex;"  >
                    @for ($i = 1;$i  <= 5 ; $i++)
                        @php
                            if ($i < $rate) {
                                 $color = 'color:#ffcc00';
                            }else{
                                $color = 'color:#ccc';
                            }
                        @endphp
                    <li style="{{ $color }};list-style: none;">&#9733;</li>
                    @endfor
                </ul>
                {{-- <small class="pt-1">(50 Reviews)</small> --}}
            </div>
            <h3 class="font-weight-semi-bold mb-4">
                <?php  
                    echo number_format(($value->product_price ),0,',','.').' '.'đ';    
                ?>
            </h3>
            <p class="mb-4">
                <?php $message = html_entity_decode($value->product_desc, ENT_QUOTES); echo $message?>
                 
            </p>
            <p class="mb-4">
                 
               Số lượng: {{ $value->product_quantity }}
            </p>
            
            <div class="d-flex align-items-center mb-4 pt-2">
                  
                <form action="">
                    @csrf
                    <input type="hidden" name="" class="pro_id_{{ $value->product_id }}" value="{{ $value->product_id  }}">
                    <input type="hidden" name="" class="pro_name_{{ $value->product_id }}" value="{{ $value->product_name  }}">
                    <input type="hidden" name="" class="pro_image_{{ $value->product_id }}" value="{{ $value->product_image  }}">
                    <input type="hidden" name="" class="pro_price_{{ $value->product_id }}" value="{{ $value->product_price  }}">
                    <input type="hidden" name="" class="pro_quantity_{{ $value->product_id }}" value="{{ $value->product_quantity  }}">
                    <?php  
                        if (Session::get('cart')) {
                            foreach (Session::get('cart') as $key => $val) {
                                 if($val['product_id'] == $value->product_id ){
                                    ?>
                                 <input type="hidden" name="" class="pro_slgh" value="{{ $val['product_quantity']  }}">
                                    <?php
                                 }
                            }
                        }else{
                            ?>
                            <input type="hidden" name="" class="pro_slgh_{{ $value->product_id }}" value="0">
                            <?php
                        }
                    ?>

                    <input style="height: 50px" type="number" min="1" name="" class="pro_qty_{{ $value->product_id }}" >

                    <input type="hidden" class="check" value="{{ Auth::check() ? 1 : 0 }}">
                    <input style="height: 50px;width: 150px" type="button" class="btn btn-primary text-dark p-0 add-cart" data-id="{{ $value->product_id }}" value="Thêm vào giỏ">
                       
                </form>
            
            </div>
            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
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
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
       
    </div>
    <div class="row px-xl-5">
        <div class="col">
         
            <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Mô tả</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Chi tiết sản phẩm</a>
                <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh giá(0)</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-pane-1">
                    <h4 class="mb-3">Mô Tả sản phẩm</h4>
                    
                    <p>  <?php $message = html_entity_decode($value->product_desc, ENT_QUOTES); echo $message?></p>
                </div>
                <div class="tab-pane fade" id="tab-pane-2">
                    <h4 class="mb-3">Chi tiết sản phẩm </h4>
                    <p>  <?php $message = html_entity_decode($value->product_content, ENT_QUOTES); echo $message?></p>
                    
                </div>
                <div class="tab-pane fade" id="tab-pane-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="mb-4">1 đánh giá "{{ $value->product_name }}"</h4>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6>John Doe<small> - <i>01 Jan 2045</i></small></h6>
                                    <div class="text-primary mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <p>Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="mb-4">Leave a review</h4>
                            <small>Your email address will not be published. Required fields are marked *</small>
                            <div class="d-flex my-3">
                                <p class="mb-0 mr-2">Your Rating * :</p>
                                <div class="text-primary">
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                            <form>
                                <div class="form-group">
                                    <label for="message">Your Review *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Your Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
 


 
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
    <h2 class="section-title px-5"><span class="px-2">Sản phẩm liên quan</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
               @foreach ( $pro1 as $key => $value)
                   
              
               <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="../public/uploads/<?=  $value->product_image ?>" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                        <h6 class="text-truncate mb-3">{{ $value->product_name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format(($value->product_price),0,',','.').' '.'đ' }}</h6> 
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
                                <p  data-id="{{ $value->product_id }}" class="btn btn-sm text-dark p-0 add-to-cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</p>
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                      
                              </div>  
                         </div>  
                    </div>  
               </div> 
            </div>
        </div>
<!-- Products End -->

@endsection