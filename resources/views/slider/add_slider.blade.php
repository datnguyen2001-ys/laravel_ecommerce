@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <form action="{{ url('save_slider') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <?php  
            $mess = Session::get('mess_succ');
            if ($mess ) {
                echo $mess;
            }
        ?>
        <div class="form-group col-md-6">
          <label for="name">Tên slider:</label>
          <input type="text" name="slider_name" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="pwd">Mô tả:</label><br>
            <textarea style="width: 100%;" name="slider_desc" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="name">ảnh:</label>
          <input type="file" name="slider_image" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
            <label  for="sel1">Trạng thái:</label>
            <select name="slider_status"  class="form-control" id="sel1">
              <option value="0">Ẩn </option>
              <option value="1">Hiện</option>
              
            </select>
          </div>
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>
</div>
@endsection