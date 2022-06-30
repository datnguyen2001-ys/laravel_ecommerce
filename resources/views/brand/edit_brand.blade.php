@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
            @foreach ($brand as $key => $value )
            
        <form action="{{ url('/edit_brand_id/'.$value->brand_id) }}" method="POST">
            @csrf
            <?php  
                $mess = Session::get('mess_succ');
                if ($mess ) {
                    echo $mess;
                }
            ?>
            
        
        <div class="form-group col-md-6">
          <label for="name">Tên danh mục:</label>
          <input value="{{$value->brand_name}}" type="text" name="brand_name" class="form-control"   id="name">
        </div>
        <div class="form-group col-md-6">
          <label for="pwd">Mô tả:</label><br>
            <textarea style="width: 100%;" name="brand_desc" id="" cols="30" rows="10">
                {{$value->brand_desc}}
            </textarea>
        </div>
        
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
</div>
</div>
@endsection