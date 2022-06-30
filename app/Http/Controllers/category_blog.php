<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class category_blog extends Controller
{
    public function add(){
        return view('category_blog.add_category_blog');
     }
     public function save_category_blog(Request $request){
        $data = array();
         $data['category_blog_name']= $request->category_blog_name;
         $data['category_blog_desc']= $request->category_blog_desc;
         $data['category_blog_status']= $request->category_blog_status;
        if ( $data['category_blog_name'] == "" ||  $data['category_blog_desc'] == "" ) {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{

            $result = DB::table('tbl_category_blog')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_category_blog')->get();
        $all = view('category_blog.all_category_blog')->with('category_blog',$select);
        return view('layouts_admin')->with('category_blog.all_category_blog',$all);
     }
     public function active($id){
         
        $select = DB::table('tbl_category_blog')->where('category_blog_id',$id)->update(['category_blog_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_category_blog')->where('category_blog_id',$id)->update(['category_blog_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_category_blog')->where('category_blog_id',$id)->get();
        $all = view('category_blog.edit_category_blog')->with('category_blog',$select);
        return view('layouts_admin')->with('category_blog.edit_category_blog',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        $data['category_blog_name']= $request->category_blog_name;
        $data['category_blog_desc']= $request->category_blog_desc;

        $result = DB::table('tbl_category_blog')->where('category_blog_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
       
     }
     public function delete($id){
         
        $select = DB::table('tbl_category_blog')->where('category_blog_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
