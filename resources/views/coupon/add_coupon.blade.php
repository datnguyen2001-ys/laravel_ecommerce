@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <form action="{{ url('save_coupon') }}" method="POST">
        @csrf
        <?php  
            $mess = Session::get('mess_succ');
            if ($mess ) {
                echo $mess;
            }
        ?>
        <div class="form-group col-md-6">
          <label for="name">Tên mã:</label>
          <input type="text" name="coupon_name" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="name">mã code</label>
          <input type="text" name="coupon_code" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="name">số lượng</label>
          <input type="number" min="1" name="coupon_quantity" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label  for="sel1">Phương thức giảm:</label>
          <select name="coupon_method"  class="form-control" id="sel1">
            <option value="0">Phần trăm </option>
            <option value="1">Tiền</option>
            
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="name">giá trị giảm</label>
          <input type="text"   name="coupon_number" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="name">Từ ngày</label><br>
          <input type= "date" id = "datepicker-8" name="coupon_start">
        </div>
        <div class="form-group col-md-6">
          <label for="name">Đến ngày</label><br>
          <input type= "date" id = "datepicker-9" name="coupon_end">
        </div>
        <div class="form-group col-md-6">
            <label  for="sel1">Trạng thái:</label>
            <select name="coupon_status"  class="form-control" id="sel1">
              <option value="0">Đang kích hoạt  </option>
              <option value="1">Đã khóa</option>
              
            </select>
          </div>
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>
</div>
@endsection