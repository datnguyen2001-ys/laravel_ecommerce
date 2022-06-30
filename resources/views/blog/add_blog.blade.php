@extends('layouts_admin');
@section('content')
<div class="container-fluid offer pt-5">
    <div class="row px-xl-5">
        <div class="col-md-12 pb-4">
          <form method="POST" action="{{ url('/save_blog') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group col-sm-6">
                <label for="exampleInputEmail1">Tên tiêu đề</label>
                <input type="text" name="blog_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  >
               
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputPassword1">mô tả</label>
                <textarea  name="blog_desc" rows="8" class="form-control" id="exampleInputPassword1">

                </textarea>
               
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputPassword1">Nội dung</label>
                <textarea  name="blog_content" rows="8" class="form-control" id="exampleInputPassword1">

                </textarea>
               
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleFormControlSelect2">danh mục Tin</label><br>
                <select style="width: 100%" name="category_blog_id"  id="exampleFormControlSelect2">
                <?php 
                     
                    foreach($cate as $key => $rows ){
                            ?>
                                <option value="<?php echo $rows->category_blog_id ?>"><?php echo  $rows->category_blog_name ?></option>
                            <?php
                    }   
                ?>
                
                
                </select>
        </div>
        <div class="form-group col-sm-6">
                <label for="exampleFormControlSelect2">ảnh</label><br>
                <input type="file" name="blog_image" id="">
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleFormControlSelect2">Trạng thái</label><br>
                <select style="width: 100%" name="blog_status"  id="exampleFormControlSelect2">
                  
                    <option value="0">Ẩn</option>
                    <option value="1">Hiện</option>
                
                </select>
        </div>
            
            <button style="margin-top: 20px" name="submit_add" type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
</div>
</div>
@endsection