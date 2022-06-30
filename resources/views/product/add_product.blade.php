@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <form action="{{ url('save_product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <?php  
            $mess = Session::get('mess');
            if ($mess ) {
                echo $mess;
            }
        ?>
        <div class="form-group col-md-6">
          <label for="name">Tên sản phẩm:</label>
          <input type="text" name="product_name" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-12">
          <label for="pwd">Mô tả:</label><br>
            <textarea style="width: 100%;" name="product_desc" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group col-md-12">
          <label for="pwd">Nội dung chi tiết sản phẩm:</label><br>
            <textarea style="width: 100%;" name="product_content" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group col-md-6">
          <label for="name">ảnh sản phẩm:</label>
          <input type="file" name="product_image" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="name"> thư viện ảnh sản phẩm:</label>
          <input multiple="multiple" type="file" name="product_images[]" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="name">giá sản phẩm:</label>
          <input type="text" name="product_price" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="name">số lượng sản phẩm:</label>
          <input type="text" name="product_quantity" class="form-control"   id="name">
        </div>
         
        <div class="form-group col-md-6">
          <label  for="sel1">Danh mục sản phẩm :</label>
          <select name="category_id"  class="form-control" id="sel1">
            @foreach ($category as $key => $val )

            <option value="{{ $val->category_id  }}">{{  $val->category_name }} </option>
              
            @endforeach
            
          </select>
        </div>
        <div class="form-group col-md-6">
          <label  for="sel1">Thương hiệu sản phẩm:</label>
          <select name="brand_id"  class="form-control" id="sel1">
            @foreach ($brand as $key => $val )

            <option value="{{ $val->brand_id  }}">{{  $val->brand_name }} </option>
              
            @endforeach
            
            
          </select>
        </div>
        <div class="form-group col-md-6">
            <label  for="sel1">Trạng thái:</label>
            <select name="product_status"  class="form-control" id="sel1">
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