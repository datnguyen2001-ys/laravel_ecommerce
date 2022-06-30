@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
            @foreach ($transport as $key => $value )
            
        <form action="{{ url('/edit_transport_id/'.$value->transport_id) }}" method="POST">
            @csrf
            <?php  
                $mess = Session::get('mess_succ');
                if ($mess ) {
                    echo $mess;
                }
            ?>
           <div class="form-group col-md-6">
            <label for="name">giá:</label>
            <input value="{{ $value->transport_feeship }}" type="text" name="transport_feeship" class="form-control"   id="name">
          </div>
        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
</div>
</div>
</div>
@endsection