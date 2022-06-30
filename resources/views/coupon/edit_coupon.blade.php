@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
            @foreach ($coupon as $key => $value )
            
        <form action="{{ url('/edit_coupon_id/'.$value->coupon_id) }}" method="POST">
            @csrf
            <?php  
                $mess = Session::get('mess_succ');
                if ($mess ) {
                    echo $mess;
                }
            ?>
            
        
            <div class="form-group col-md-6">
                <label for="name">Tên mã:</label>
                <input value="{{ $value->coupon_name }}" type="text" name="coupon_name" class="form-control"   id="name">
              </div>
              <div class="form-group col-md-6">
                <label for="name">mã code</label>
                <input value="{{ $value->coupon_code }}" type="text" name="coupon_code" class="form-control"   id="name">
              </div>
              <div class="form-group col-md-6">
                <label for="name">số lượng</label>
                <input value="{{ $value->coupon_quantity }}" type="number" min="1" name="coupon_quantity" class="form-control"   id="name">
              </div>
              <div class="form-group col-md-6">
                <label  for="sel1">Phương thức giảm:</label>
                <select name="coupon_method"  class="form-control" id="sel1">
                    <?php 
                        if ($value->coupon_method == 0) {
                           ?>
                            <option selected value="0">Phần trăm </option>
                            <option value="1">Tiền</option>
                           <?php
                        }else{
                            ?>
                             <option selected value="1">Tiền</option>
                             <option  value="0">Phần trăm </option>
                           <?php
                        }    
                    ?>
                   
                  
                  
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="name">giá trị giảm</label>
                <input type="text" value="{{ $value->coupon_number}}"  name="coupon_number" class="form-control"   id="name">
              </div>
              <div class="form-group col-md-6">
                <label for="name">Từ ngày</label><br>
                <input value="{{ $value->coupon_start}}" type= "date" id = "datepicker-8" name="coupon_start">
              </div>
              <div class="form-group col-md-6">
                <label for="name">Đến ngày</label><br>
                <input type= "date" value="{{ $value->coupon_end}}" id = "datepicker-9" name="coupon_end">
              </div>
              <div class="form-group col-md-6">
                  <label  for="sel1">Trạng thái:</label>
                  <select name="coupon_status"  class="form-control" id="sel1">
                    <?php 
                    if ($value->coupon_method == 0) {
                       ?>
                        <option selected value="0">Đang kích hoạt  </option>
                        <option value="1">Đã khóa</option>
                       <?php
                    }else{
                        ?>
                         <option   value="0">Đang kích hoạt  </option>
                         <option selected value="1">Đã khóa</option>
                       <?php
                    }    
                ?>
               
                   
                   
                    
                  </select>
                </div>
        
        
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
</div>
</div>
@endsection