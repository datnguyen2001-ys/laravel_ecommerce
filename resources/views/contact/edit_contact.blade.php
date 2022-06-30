@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
            @foreach ($contact as $key => $value )
            
        <form action="{{ url('/edit_contact_id/'.$value->contact_id) }}" method="POST">
            @csrf
            <?php  
                $mess = Session::get('mess_succ');
                if ($mess ) {
                    echo $mess;
                }
            ?>
            
        
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" value="{{ $value->contact_phone }}" name="contact_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputPassword1">Địa chỉ</label>
                <input type="text"  value="{{ $value->contact_address }}" name="contact_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputPassword1"> giờ mở cửa</label>
                <input type="text"  value="{{ $value->contact_time }}" name="contact_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Email</label>
                <input type="text"  value="{{ $value->contact_email }}" name="contact_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
          <div class="form-group col-sm-6">
            <label for="exampleInputEmail1">map</label>
            <input type="text"  value="{{ $value->contact_map }}" name="contact_map" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
           
        </div> 
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
</div>
</div>
@endsection