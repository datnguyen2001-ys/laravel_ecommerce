@extends('layouts_pages')
@section('content1')
</div>
</div>
</div>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cửa hàng chúng tôi</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/index') }}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Cửa hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


 
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
       
        <div class="col-lg-3 col-md-12">
           
            <div class="border-bottom mb-4 pb-4">
                <h5 class="font-weight-semi-bold mb-4">Lọc danh mục</h5>
                @php
                    $brand_id = [];
                    $cate_arr = [];
                    if (isset($_GET['cate']) && $_GET['cate'] !=  null ) {
                        $brand_id = $_GET['cate'];
                    }else{
                        $brand_id = '';
                    } 
                    $cate_arr = explode(',',$brand_id)
                @endphp
                   @foreach ($cate as $key => $value )
                       
                   <label style="display: block"  > 
                       <input type="checkbox" 
                       {{ in_array($value->category_id,$cate_arr) ? 'checked' : '' }}
                       data-filter="category" name="category-filter" class="form-control-checkbox category-filter" value="{{  $value->category_id}}">
                       <?=  $value->category_name?>
                    </label>
                   @endforeach

                   
                   
                
            </div>
            
            <div class="mb-5">
                <h5 class="font-weight-semi-bold mb-4">Lọc thương hiệu</h5>
                @php
                    $cate_id = [];
                    $cate_arr = [];
                    if (isset($_GET['brand']) && $_GET['brand'] !=  null ) {
                        $cate_id = $_GET['brand'];
                    }else{
                        $cate_id = '';
                    } 
                    $cate_arr = explode(',',$cate_id)
                @endphp
                    @foreach ($brand as $key => $br)
                        <label style="display: block"  >
                            <input type="checkbox"
                            {{ in_array($br->brand_id,$cate_arr) ? 'checked':'' }}
                           
                            data-filter="brand" class="form-control-checkbox brand-filter" name="brand-filter"  value="{{ $br->brand_id }}">
                            <?= $br->brand_name?>
                        </label>
                    @endforeach
            </div>
            
        </div>
       
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="{{ url('/search-product') }}" method="GET" >
                          
                            <div class="input-group">
                                <input type="text" name="key" class="form-control key" placeholder="Nhập tên sản phẩm">
                            
                               <input value="tìm kiếm" type="submit" value="" class="search-product btn btn-primary">
                            </div>
                        </form>
                        <div class="dropdown ml-4">
                            
                           
                                <form action=""> 
                                    @csrf
                                    <select name="sort" class="form-control" id="sort"> 
                                <option value=" ">sắp xếp</option>
                                
                                {{-- <option value="{{ Request::url()}}?sort_by=tang_dan">giá tăng dần</option>
                                <option value="{{ Request::url()}}?sort_by=giam_dan">giá giảm dần</option>
                                <option value="{{ Request::url()}}?sort_by=a_z">Theo tên từ a->z</option>
                                <option value="{{ Request::url()}}?sort_by=z_a">Theo tên từ z->a </option> --}}

                                <option value="{{request()->fullUrlWithQuery(['sort_by' => 'tang_dan'])  }}">giá tăng dần</option>
                                <option value="{{request()->fullUrlWithQuery(['sort_by' => 'giam_dan'])  }}">giá giảm dần</option>
                                <option value="{{request()->fullUrlWithQuery(['sort_by' => 'a_z'])  }}">Theo tên từ a->z</option>
                                <option value="{{request()->fullUrlWithQuery(['sort_by' => 'z_a'])  }}">Theo tên từ z->a </option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
               
               @foreach ($pro as $key => $value )
               <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="./public/uploads/<?=  $value->product_image ?>" alt="">
                        <img class="img-fluid w-100" src="../public/uploads/<?=  $value->product_image ?>" alt="">
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
                            <input type="hidden" name="" class="pro_qty_{{ $value->product_id }}" value="1">
                            <input type="hidden" class="check" value="{{ Auth::check() ? 1 : 0 }}">
                            <p  data-id="{{ $value->product_id }}" class="btn btn-sm text-dark p-0 add-cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Thêm vào giỏ</p>
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
               <div class="col-12 pb-1 pagination justify-content-center mb-3">
                
               {{ $pro->links() }}
           
        </div> 
                
            </div>
        </div>
        
    </div>
</div>

@endsection