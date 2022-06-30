<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class Category extends Controller
{
     public function add(){
        return view('category.add_category');
     }
     public function save_category(Request $request){
        $data = array();
         $data['category_name']= $request->category_name;
         $data['category_desc']= $request->category_desc;
         $data['category_status']= $request->category_status;
         $get_image = $request->file('category_image');
        if ( $data['category_name'] == "" ||  $data['category_desc'] == ""||$get_image == "" ) {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{
         $name_name = $get_image->getClientOriginalName();
         $ta = current(explode('.',$name_name));
          $path = 'public/uploads/';
          $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
          $get_image->move($path,$name);
          $data['category_image'] = $name;
            $result = DB::table('tbl_category')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_category')->get();
        $all = view('category.all_category')->with('category',$select);
        return view('layouts_admin')->with('category.all_category',$all);
     }
     
     public function active($id){
         
        $select = DB::table('tbl_category')->where('category_id',$id)->update(['category_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_category')->where('category_id',$id)->update(['category_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_category')->where('category_id',$id)->get();
        $all = view('category.edit_category')->with('category',$select);
        return view('layouts_admin')->with('category.edit_category',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        $data['category_name']= $request->category_name;
        $data['category_desc']= $request->category_desc;
        $get_image = $request->file('category_image');
        if ($get_image != null ) {
         $name_name = $get_image->getClientOriginalName();
         $ta = current(explode('.',$name_name));
          $path = 'public/uploads/';
          $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
          $get_image->move($path,$name);
          $data['category_image'] = $name;
     
              
        $result = DB::table('tbl_category')->where('category_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
      }else{
         $result1a = DB::table('tbl_category')->where('category_id',$id)->update($data);
         return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
      }
     }
     public function delete($id){
         
        $select = DB::table('tbl_category')->where('category_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
