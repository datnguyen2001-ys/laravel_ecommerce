@extends('layouts_admin');

@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <h2>Chi tiết đơn hàng</h2>
    @foreach ($order as $key => $value )
    <p style="color: black;">Họ tên người nhận: {{  $value->shipping_name }}  </p>
    <p style="color: black;">Số điện thoại:  {{  $value->shipping_phone }}  </p>
    <p style="color: black;">Địa chỉ nhận hàng: {{  $value->shipping_address }}   </p>
    <p style="color: black;">Ghi chú: {{  $value->shipping_notes }}  </p>
    <p style="color: black;">ngày đặt:  {{  $value->created_at }}  </p>
    <p style="color: black;">trạng thái đơn hàng: 
        <?php  
        if ( $value->order_status == 1) {
           echo "<span style ='color:green'>Đang xử lí</span>";
        }elseif( $value->order_status == 2){
            echo "<span style ='color:orange'>Đã xử lí</span>";
        } elseif( $value->order_status == 3){
          echo 'đang giao hàng';
        }  elseif( $value->order_status == 4){
            echo "<span style ='color:pink'>Đã giao</span>";
        }else{
            echo "<span style ='color:red'>huỷ đơn hoặc trả lại</span>";
        }
    ?>
    </p>
    @endforeach
    
    <div class="table-responsive-sm">  
        <form action="">
        @csrf    
              
    <table class="table table-bordered">
      <thead>
        <tr>
            <th scope="col">Số thứ tự</th>
            <th scope="col">Tên sản phẩm</th>
            <th scope="col">ảnh</th>
            <th scope="col">số lượng</th>
            <th scope="col">giá</th>
            <th scope="col">Thành tiền</th>
         
         
        </tr>
      </thead>
      <tbody>
        @php
              $i = 0
          @endphp
        @foreach ($order_det as $key => $value )
        @php
            $i++;
        @endphp
        <tr> 
            <td><?=  $i; ?></td>
             <td>{{  $value->product_name }}</td>
             <td  ><img style="height: 100px" src="../public/uploads/<?=  $value->product_image ?>"></td>
             <td>
                <input type="hidden" class="pro_quantity" name="qty" value="{{ $value->product_sales_quantity }}"  >
                <input type="hidden" class="pro_id" name="pro_id" value="{{ $value->product_id }}"  >
                {{  $value->product_sales_quantity }}
            </td>
             <td>{{ number_format(($value->product_price),0,',','.').' '.'đ' }}</td>
             <td>
               @php
                    $total =   $value->product_price*$value->product_sales_quantity;  
                    echo number_format(($total),0,',','.').' '.'đ'
                @endphp 
               
            </td>
        </tr>
         @endforeach
         <tr>
            <td colspan="6" rowspan="1"> Tổng tiền:
                  @php
                   $total1 = 0;
                  @endphp 
               
                @foreach ($order_det as $key => $value )
                    <?php  
                $total1 +=   $value->product_price*$value->product_sales_quantity; 
                    ?>
                @endforeach
                <?= number_format(($total1),0,',','.').' '.'đ'     ?>
            </td>
        </tr>
            <tr>
                <td colspan="6" rowspan="1">giảm giá:
                    @php
                        $coupon1;
                    @endphp
                    @foreach ($order_det as $key => $value )
                    <?php
                       if ($value->coupon_method  == 0) {
                                    $coupon1 = ($total * $value->coupon_number)/100;
                                }else{
                                    $coupon1 = $value->coupon_number;
                                }
                    ?>
                    @endforeach
                    <?= number_format(($coupon1),0,',','.').' '.'đ'  ?>
                </td>
            </tr>
            <tr> 
                <td colspan="6" rowspan="1">Phí vận chuyển:
                    @php
                        $coupon2;
                    @endphp
                    @foreach ($order_det as $key => $value )
                    <?php
                          $coupon2= $value->product_feeship;
                    ?>
                    @endforeach
                    <?= number_format(($coupon2),0,',','.').' '.'đ'  ?>
                </td>
             </tr>
             <tr> 
                <td colspan="6" rowspan="1">Thành tiền:
                    @php
                        $coupon3;
                    @endphp
                    
                    <?php
                          $coupon3=  $total1 +  $coupon2 - $coupon1;
                    ?>
                   
                    <?= number_format(($coupon3),0,',','.').' '.'đ'  ?>
                </td>
             </tr> 
             <tr>
                <td colspan="6" rowspan="1"> 
                <div class="form-group">
                    <label for="sel1">Trạng thái đơn hàng:</label>
                    <select class="form-control change" id="sel1">
                         @foreach ($order as $key => $value )
                            <?php  
                     if ( $value->order_status == 1) {
                        ?><option selected value="1">đang xử lí</option><?php
                        ?><option id="{{$value->order_id  }}" value="2">đã xử lí</option><?php
                        ?><option id="{{$value->order_id  }}" value="3">đang giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="4">đã giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="5">hủy đơn hoặc trả hàng</option><?php
                    }
                    elseif( $value->order_status == 2){
                        ?><option id="{{$value->order_id  }}" value="1">đang xử lí</option><?php
                        ?><option  selected  id="{{$value->order_id  }}"  value="2">đã xử lí</option><?php
                        ?><option id="{{$value->order_id  }}" value="3">đang giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="4">đã giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="5">hủy đơn hoặc trả hàng</option><?php
                    } elseif( $value->order_status == 3){
                        ?><option id="{{$value->order_id  }}" value="1">đang xử lí</option><?php
                        ?><option id="{{$value->order_id  }}"  value="2">đã xử lí</option><?php
                        ?><option  selected  id="{{$value->order_id  }}"  value="3">đang giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="4">đã giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="5">hủy đơn hoặc trả hàng</option><?php
                    }  elseif( $value->order_status == 4){
                        ?><option id="{{$value->order_id  }}" value="1">đang xử lí</option><?php
                        ?><option  id="{{$value->order_id  }}" value="2">đã xử lí</option><?php
                        ?><option  id="{{$value->order_id  }}" value="3">đang giao</option><?php
                        ?><option selected  id="{{$value->order_id  }}"   value="4">đã giao</option><?php
                        ?><option id="{{$value->order_id  }}" value="5">hủy đơn hoặc trả hàng</option><?php
                    }else{
                        ?><option id="{{$value->order_id  }}" value="1">đang xử lí</option><?php
                        ?><option id="{{$value->order_id  }}"  value="2">đã xử lí</option><?php
                        ?><option id="{{$value->order_id  }}"  value="3">đang giao</option><?php
                        ?><option  id="{{$value->order_id  }}"   value="4">đã giao</option><?php
                        ?><option  id="{{$value->order_id  }}" selected  value="5">hủy đơn hoặc trả hàng</option><?php
                    }
                    
                            ?>
                         @endforeach
                    </select>
                  </div>
                </td>
             </tr>
            
      </tbody>
    </table>

</form> 
    </div>
  </div>
</div>
</div>
</div>  
@endsection