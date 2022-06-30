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
          <th>Trạng thái</th>
          <th>Action</th>
           
        </tr>
      </thead>
      <tbody>
          
          @foreach($blog as $key => $value) 
          
          <tr>
            
                    <td><?= $value->blog_name  ?></td>
                    <td><?= $value->blog_desc  ?></td>
                    <td>
                    <?php 
                         if ($value->blog_status== 1) {
                           ?>
                            <a href="{{ url('/unactive_blog/'. $value->blog_id) }}" ><i class="fa-solid fa-toggle-on"></i></a>
                           <?php
                         }else{
                            ?>
                           <a href="{{ url('/active_blog/'. $value->blog_id) }}" ><i class="fa-solid fa-toggle-off"></i></a>
                           <?php
                         }

                        ?>

                    </td>
                    <td>
                        <a href="{{ url('/edit_blog/'. $value->blog_id) }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return confirm('bạn có muốn xóa?')" href="{{ url('/delete_blog/'. $value->blog_id) }}" ><i class="fa-solid fa-circle-xmark"></i></a>
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