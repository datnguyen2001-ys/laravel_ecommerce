@extends('layouts_admin');

@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <h2>Quản lí vận chuyển</h2>
    
    <div class="table-responsive-sm">          
    <table class="table table-bordered">
      <thead>
        <tr>
       
          <th>Tên thành phố</th>
          <th>huyện</th>
          <th>xã</th>
          <th>giá vận chuyển</th>
          <th>Action</th>
           
        </tr>
      </thead>
      <tbody>
          
          @foreach($transport as $key => $value) 
          
          <tr>
            
                    <td><?= $value->transport_matp  ?></td>
                    <td><?= $value->transport_maqh  ?></td>
                    <td><?= $value->transport_xaid  ?></td>
                    <td><?= number_format(($value->transport_feeship),0,',','.').' '.'đ'  ?></td>
                   
                    
                    <td>
                        <a href="{{ url('/edit_transport/'. $value->transport_id) }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return confirm('bạn có muốn xóa?')" href="{{ url('/delete_transport/'. $value->transport_id) }}" ><i class="fa-solid fa-circle-xmark"></i></a>
                    </td>

                  
                  
                </tr>
                @endforeach
            
      </tbody>
    </table>
    </div>
  </div>
</div>
</div>
</div>  
@endsection