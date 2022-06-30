 
        @extends('layouts_pages')
@section('content1')
</div>
</div>
</div>
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">giỏ hàng</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/index') }}">Trang chủ</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">giỏ hàng</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        @if (Session::get('cart') == true)
       
        
        <div class="col-lg-8 table-responsive mb-5">
            <?php  
            $me = Session::get('mess1');
            if ($me) {
                echo $me;
            }
        ?>
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>ảnh</th>
                        <th>giá</th>
                        <th>số lượng</th>
                        <th>tổng tiền</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <form action="{{url('/update-quantity') }}" method="post">
                        @csrf 
                   @foreach (Session::get('cart') as $key => $value)
                       
                   
                    <tr>
                        <td  style="width: 200px"class="align-middle">{{ $value['product_name'] }}</td>
                        <td class="align-middle"><img src="./public/uploads/<?= $value['product_image']?>" alt="" style="width: 50px;">  </td>
                        <td class="align-middle">

                            <?php
                        
                                $to=  $value['product_price'] ;
                                    echo number_format(($to),0,',','.').' '.'đ';
                        ?>
                        </td>
                        <td class="align-middle">
                            <input style="width: 100px" type="number" min="1" name="pro_qty[{{  $value['session_id'] }}]" value="{{  $value['product_quantity'] }}">
                        </td>
                        <td class="align-middle">
                            <?php
                        
                                $to=  $value['product_price'] * $value['product_quantity'] ;
                                    echo number_format(($to),0,',','.').' '.'đ';
                        ?>
                        </td>
                        <td class="align-middle">
                            <a onclick="return confirm('bạn có muốn xóa?')" href="{{ url('/delete-cart/'.$value['session_id']) }}">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">
                            <input type="submit" value="Cập nhật giỏ hàng" name="submit" class="btn btn-primary">
                              
                        </td>
                        <td colspan="3">
                           <a onclick="return confirm('bạn muốn xóa?')" href="{{ url('/delete-all-cart') }}" class="btn btn-primary" href="">Xoá tất cả</a>
                              
                        </td>
                    </tr>
                </tbody>
            </form>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="input-group">
                <?php  
                    $me = Session::get('mess');
                    if ($me) {
                       
                           echo "<span style='color:green'>$me</span>";
                    }    
                    
                ?>
                 <?php  
                 $me1 = Session::get('mess_error');
                 if ($me1) {
                     # code...
                     echo "<span style='color:red'>$me1</span>";
                   
                 }    
                 
             ?>
             
                    <form style="display: flex" action="{{ url('/check-coupon') }}" method="POST">
                        @csrf
                    <input type="text" name="coupon_code" class="form-control p-4" placeholder="nhập mã giảm giá...">
                   
                        <button style="width: 150px" type="submit" name="submit" class="btn btn-primary">Nhập mã</button>
                  
                    </form>
                </div>

                <div style="margin-top: 35px" class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Địa chỉ giao hàng</h4>
                    </div>
                    <form action="{{ url('/check-transport') }}" method="POST"  >
                        @csrf
                         
                          <div class="form-group col-md-12">
                            <label  for="sel1">Tên thành phố:</label>
                            <select name="transport_matp"  class="form-control choose thanhpho" id="thanhpho">
                              <option value="">---Chọn---</option>
                              @foreach ($tp as $key => $value )
                              <option value="{{ $value->matp }}">{{ $value->name_city }} </option>
                                
                              @endforeach
                               
                              
                            </select>
                          </div>
                          <div class="form-group col-md-12">
                            <label  for="sel1">Tên huyện:</label>
                            <select name="transport_maqh"   class="form-control choose huyen" id="huyen">
                              <option value="">---Chọn---</option>
                              
                            </select>
                          </div>
                         <div class="form-group col-md-12">
                          <label  for="sel1">Tên xã phường :</label>
                          <select name="transport_xaid"  class="form-control xa" id="xa">
                            <option value="">---Chọn---</option>
                            
                          </select>
                        </div>
                        
                        <button  style="margin-top: 20px;margin-left: 20px" type="submit" class="btn btn-primary">Tính phí</button>
                      </form>
                    </div>


            <div class="card border-secondary mb-5">
                @if (Session::get('cart') == true)
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thanh toán</h4>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Tạm tính</h6>
                        <h6 class="font-weight-medium">
                            @php
                                 $total = 0
                            @endphp
                            @foreach (Session::get('cart') as $key => $value )
                            <?php
                                $total +=  $value['product_quantity'] * $value['product_price'];
                                
                                
                            ?>
                        @endforeach
                        <?php 
                            
                        echo number_format(($total),0,',','.').' '.'đ' ; 
                        
                        ?>
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        @if (Session::get('transport'))
                        <h6 class="font-weight-medium">phí vận chuyển</h6>
                        <h6 class="font-weight-medium">
                        <?php 
                        $cv = Session::get('transport');
                        echo number_format(($cv),0,',','.').' '.'đ';
                         ?>
                         </h6>
                            
                        @else
                        <h6 class="font-weight-medium">phí vận chuyển</h6>
                        <h6 class="font-weight-medium">0đ   </h6>

                        @endif
                    </div>

                    <div class="d-flex justify-content-between">
                        @if (Session::get('coupon'))
                        <h6 class="font-weight-medium">giảm giá</h6>
                        <h6 class="font-weight-medium">
                        @php 
                        $phantram = 0;
                        
                        @endphp
                            @foreach (Session::get('coupon') as $key => $value) 
                            <?php
                                if ($value['coupon_method'] == 0) {
                                    $phantram = ($total * $value['coupon_number'])/100;
                                }else{
                                    $phantram = $value['coupon_number'];
                                }
                                ?>
                            @endforeach
                           <?php echo number_format(($phantram),0,',','.').' '.'đ'; ?>
                         
                         </h6>
                            
                        @else
                            @php
                                $phantram = 0;
                            @endphp
                        <h6 class="font-weight-medium">giảm giá</h6>
                        <h6 class="font-weight-medium">0đ   </h6>

                        @endif
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold">
                            <?php 

                                $sum = ($total -$phantram) + Session::get('transport');
                                echo number_format(($sum),0,',','.').' '.'đ';
                            ?>
                        </h5>
                    </div>
                    <a href="{{ url('/check-out') }}" class="btn btn-block btn-primary my-3 py-3">Thanh Toán</a>
                     
                </div>
                 
                @else
                    
                @endif
                
            </div>
             
            
        </div>
        @else
                
            <?php 
                echo "<h3 style='color:red'>giỏ hàng của bạn đang trống!!!</h3>";
            ?>
     
        @endif
    </div>
</div>
<!-- Cart End -->
@endsection
 