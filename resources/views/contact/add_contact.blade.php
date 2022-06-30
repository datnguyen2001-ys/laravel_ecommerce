@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
          <form method="POST" action="{{ url('/save_contact') }}"  >
            @csrf
            
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="text" name="contact_phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputPassword1">Địa chỉ</label>
                <input type="text" name="contact_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputPassword1"> giờ mở cửa</label>
                <input type="text" name="contact_time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="contact_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
          <div class="form-group col-sm-6">
            <label for="exampleInputEmail1">map</label>
            <input type="text" name="contact_map" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
           
        </div> 
             
            
            <button style="margin-top: 20px" name="submit_add" type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
</div>
</div>
@endsection