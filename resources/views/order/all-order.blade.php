@extends('layouts_admin');

@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <h2>Quản lí đơn hàng</h2>
    
    <div class="table-responsive-sm">          
    <table class="table table-bordered">
      <thead>
        <tr>
            <th>Số thứ tự</th>
          <th>mã đơn hàng</th>
          <th>Tình trạng đơn hàng</th>
        
         
          <th>action</th>
        </tr>
      </thead>
      <tbody>
          @php
              $i = 0
          @endphp
        @foreach ($order as $key => $value )
        @php
            $i++;
        @endphp
        <tr> 
        <td><?=  $i; ?></td>
        <td>{{  $value->order_code }}</td>
        <td>
            <?php  
                if ( $value->order_status == 1) {
                   echo "<span style ='color:green'>Đang xử lí</span>";
                }elseif( $value->order_status == 2){
                    echo "<span style ='color:orange'>Đã xử lí</span>";
                } elseif( $value->order_status == 3){
                    echo "<span style ='color:pink'>Đang giao</span>";
                }elseif( $value->order_status == 4){
                        echo "<span style ='color:pink'>Đã giao</span>";
                 }else{
                    echo "<span style ='color:red'>huỷ đơn hoặc trả lại</span>";
                }
            ?>
        </td>
        <td>
            <a href="{{ url('/view-order/'.$value->order_code) }}"><i class="fa-solid fa-eye"></i></a>
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