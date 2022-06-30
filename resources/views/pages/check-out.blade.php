@extends('layouts_pages')
@section('content1')
</div>
</div>
</div>
 <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Checkout Start -->
<div class="container-fluid pt-5">
    <form action="{{ url('/save-order') }}" method="post"> 
        @csrf
    <div class="row px-xl-5">

        @if (Session::get('cart'))
       
            
        <div class="col-lg-7">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Địa chỉ thanh toán</h4>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <label>Họ Tên</label>
                        <input name="shipping_name" class="form-control" type="text" placeholder="John">
                    </div>
                   
                    <div class="col-md-12 form-group">
                        <label>E-mail</label>
                        <input  name="shipping_email" class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Số điện thoại</label>
                        <input  name="shipping_phone" class="form-control" type="text" placeholder="+123 456 789">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>Địa chỉ</label>
                        <input  name="shipping_address" class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-12 form-group">
                        <label>ghi chú:</label><br>
                         <textarea  name="shipping_notes" style="width: 100%" placeholder="Viết những thứ cần thiết về đơn hàng..." name="shipping_notes" id=""  rows="10"></textarea>
                    </div>
                </div>
            </div>
        
        </div>
        <div class="col-lg-5">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Chi tiết đơn đặt hàng</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Sản phẩm</h5>
                        @if (Session::get('cart'))
                            @foreach (Session::get('cart') as $key => $value )
                            <div class="d-flex justify-content-between">
                                <p> <?= $value['product_name']  ?> x <?= $value['product_quantity']  ?></p>
                                <p> 
                                    <?php
                        
                                            $to=  $value['product_price'] * $value['product_quantity'] ;
                                            echo number_format(($to),0,',','.').' '.'đ';
                                     ?>
                                </p>
                            </div>
                             
                            @endforeach
                        @endif
                   
                  
                    <hr class="mt-0">
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
                            <h6 class="font-weight-medium">giảm giá</h6>
                            <h6 class="font-weight-medium">0đ   </h6>

                            @endif
                </div>


                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5  class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold">
                            <?php 

                                $sum = ($total -$phantram) + Session::get('transport');
                                echo number_format(($sum),0,',','.').' '.'đ';
                            ?>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Thanh Toán</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="sel1">Phương thức thanh toán:</label>
                        <select name="shipping_method" class="form-control" id="sel1">
                          <option value="1">tiền mặt</option>
                          <option value="2">chuyển khoản</option>
                          <option value="2">Paypal</option>
                          
                        </select>
                      </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button onclick="return confirm('bạn có muốn đặt hàng?')" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Xác nhận đơn hàng</button>
                </div>
            </div>
        </div>
    
        @else
                @php
                    $mess = Session::get('mess_order');
                @endphp
                @if ( $mess)
                <?php  echo $mess; ?>
                    
                @else
                <h3>Bạn không có đơn hàng nào để thanh toán</h3>
                    
                @endif
        @endif

         
    
    </div>
</form>
</div>
@endsection