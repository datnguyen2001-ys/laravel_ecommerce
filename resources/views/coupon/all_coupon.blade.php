  

@extends('layouts_admin');

@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <h2>Quản lí mã giảm giá.</h2>
    
    <div class="table-responsive-sm">          
    <table class="table table-bordered">
      <thead>
        <tr>
       
          <th>Tên mã</th>
          <th>Mã code</th>
          <th>Số lượng</th>
          <th>giảm theo</th>
          <th>giá trị giảm</th>
          <th>ngày bắt đầu</th>
          <th>ngày kết thúc</th>
          <th>Trạng thái</th>
          <th>Hiệu lực</th>
          <th>Action</th>
           
        </tr>
      </thead>
      <tbody>
          
          @foreach($coupon as $key => $value) 
          
          <tr>
            
                    <td><?= $value->coupon_name  ?></td>
                    <td><?= $value->coupon_code  ?></td>
                    <td><?= $value->coupon_quantity  ?></td>
                    <td>
                      <?php
                        if ($value->coupon_method == 0) {
                         echo "<span style='color:red'>giảm theo phần trăm</span>";
                        }else{
                          echo "<span style='color:green'>giảm tiền</span>";
                        }
                      ?>
                    </td>
                    <td>
                      <?php
                        if ($value->coupon_method == 0) {
                         echo $value->coupon_number.'%';
                        }else{
                          echo number_format(($value->coupon_number),0,',','.').' '.'đ';
                        }
                      ?>
                    </td>
                    <td>
                      <?php 
                       $newDate = date("d-m-Y", strtotime($value->coupon_start));  
                       echo $newDate; 
                      ?>
                  </td>
                  <td>
                    <?php 
                     $newDate = date("d-m-Y", strtotime($value->coupon_end));  
                     echo $newDate; 
                    ?>
                </td>
                    <td>
                    <?php 
                         if ($value->coupon_status== 0) {
                          echo "<span style='color:green'>Đã kích hoạt</span>";
                         }else{
                          echo "<span style='color:red'>Đã khóa</span>";
                         }

                        ?>

                    </td>
                    <td>
                        <?php  
                          date_default_timezone_set('Asia/Ho_Chi_Minh');
                          $date =  date('d-m-Y');
                          $newDate = date("d-m-Y", strtotime($value->coupon_end));
                          if (strtotime($date) <= strtotime($newDate)) {
                            echo "<span style='color:green'>còn hạn</span>";
                          }else{
                            echo "<span style='color:red'>hết hạn</span>";
                          }
                          ?>
                    </td>
                    <td>
                        <a href="{{ url('/edit_coupon/'. $value->coupon_id) }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return confirm('bạn có muốn xóa?')" href="{{ url('/delete_coupon/'. $value->coupon_id) }}" ><i class="fa-solid fa-circle-xmark"></i></a>
                    </td>

                  
                  
                </tr>
                @endforeach
            
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>
</div>  
@endsection