@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <form action="{{ url('save_transport') }}" method="POST" >
        @csrf
        <?php  
            $mess = Session::get('mess_succ');
            if ($mess ) {
                echo $mess;
            }
        ?>
          <div class="form-group col-md-6">
            <label  for="sel1">Tên thành phố:</label>
            <select name="transport_matp"  class="form-control choose thanhpho" id="thanhpho">
              <option value="">---Chọn---</option>
              @foreach ($tp as $key => $value )
              <option value="{{ $value->matp }}">{{ $value->name_city }} </option>
                
              @endforeach
               
              
            </select>
          </div>
          <div class="form-group col-md-6">
            <label  for="sel1">Tên huyện:</label>
            <select name="transport_maqh"   class="form-control choose huyen" id="huyen">
              <option value="">---Chọn---</option>
              
            </select>
          </div>
         <div class="form-group col-md-6">
          <label  for="sel1">Tên xã phường :</label>
          <select name="transport_xaid"  class="form-control xa" id="xa">
            <option value="">---Chọn---</option>
            
          </select>
        </div>
        
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
</div>
</div>
@endsection