@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
            @foreach ($slider as $key => $value )
            
        <form action="{{ url('/edit_slider_id/'.$value->slider_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <?php  
                $mess = Session::get('mess_succ');
                if ($mess ) {
                    echo $mess;
                }
            ?>
            
        
        <div class="form-group col-md-6">
          <label for="name">Tên danh mục:</label>
          <input value="{{$value->slider_name}}" type="text" name="slider_name" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="pwd">Mô tả:</label><br>
            <textarea style="width: 100%;" name="slider_desc" id="" cols="30" rows="10">
                {{$value->slider_desc}}
            </textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="name">ảnh sản phẩm:</label>
            <input type="file" name="slider_image" class="form-control"   id="name">
            <img style="width: 100px" src="../public/uploads/<?= $value->slider_image  ?>" alt="">
          </div>
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
</div>
</div>
@endsection