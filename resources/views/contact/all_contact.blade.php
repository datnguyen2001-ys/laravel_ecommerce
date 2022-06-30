@extends('layouts_admin');

@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <h2>Quản lí liên hệ.</h2>
    
    <div class="table-responsive-sm">          
    <table class="table table-bordered">
      <thead>
        <tr>
       
          <th>Số điện thoại</th>
          <th>địa chỉ</th>
          <th>Thời gian</th>
          <th>Email</th>
         
          <th>action</th>
        </tr>
      </thead>
      <tbody>
          
          @foreach($contact as $key => $value) 
          
          <tr>
            
                    <td><?= $value->contact_phone  ?></td>
                    <td><?= $value->contact_address  ?></td>
                    <td><?= $value->contact_time  ?></td>
                    <td><?= $value->contact_email  ?></td>
                    
                     
                    <td>
                        <a href="{{ url('/edit_contact/'. $value->contact_id) }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return confirm('bạn có muốn xóa?')" href="{{ url('/delete_contact/'. $value->contact_id) }}" ><i class="fa-solid fa-circle-xmark"></i></a>
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