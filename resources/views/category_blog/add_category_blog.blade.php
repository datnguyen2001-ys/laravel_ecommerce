@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <form action="{{ url('save_category_blog') }}" method="POST">
        @csrf
        <?php  
            $mess = Session::get('mess_succ');
            if ($mess ) {
                echo $mess;
            }
        ?>
        <div class="form-group col-md-6">
          <label for="name">Tên Danh mục:</label>
          <input type="text" name="category_blog_name" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="pwd">Mô tả:</label><br>
            <textarea style="width: 100%;" name="category_blog_desc" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group col-md-6">
            <label  for="sel1">Trạng thái:</label>
            <select name="category_blog_status"  class="form-control" id="sel1">
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