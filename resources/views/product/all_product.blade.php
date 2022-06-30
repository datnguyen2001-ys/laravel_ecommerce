@extends('layouts_admin');

@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
    <h2>Quản lí danh mục sản phẩm.</h2>
    
    <div class="table-responsive-sm">          
    <table class="table table-bordered">
      <thead>
        <tr>
       
          <th>Tên danh mục</th>
          <th>Mô tả</th>
          <th>chi tiết sản phẩm</th>
          <th>giá</th>
          <th>ảnh</th>
          <th>danh mục sản phẩm</th>
          <th>Thương hiệu</th>
          <th>Trạng thái</th>
          <th>Action</th>
           
        </tr>
      </thead>
      <tbody> 
        @foreach($product as $key => $value) 
          <tr>
            
                    <td  ><?= $value->product_name  ?></td>
                    <td  ><?= $value->product_desc  ?></td>
                   
                    <td ><?= number_format(($value->product_price),0,',','.').' '.'đ'  ?></td>
                    <td ><?= $value->product_content  ?></td>
                    <td>
                      <img style="width: 100px" src="./public/uploads/<?= $value->product_image  ?>" alt="">
                    </td>
                    <td ><?= $value->category_name  ?></td>
                    <td ><?= $value->brand_name  ?></td>
                    <td>
                    <?php 
                         if ($value->product_status== 1) {
                           ?>
                            <a href="{{ url('/unactive/'. $value->product_id) }}" ><i class="fa-solid fa-toggle-on"></i></a>
                           <?php
                         }else{
                            ?>
                           <a href="{{ url('/active/'. $value->product_id) }}" ><i class="fa-solid fa-toggle-off"></i></a>
                           <?php
                         }

                        ?>

                    </td>
                    <td>
                        <a href="{{ url('/edit/'. $value->product_id) }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return confirm('bạn có muốn xóa?')" href="{{ url('/delete/'. $value->product_id) }}" ><i class="fa-solid fa-circle-xmark"></i></a>
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