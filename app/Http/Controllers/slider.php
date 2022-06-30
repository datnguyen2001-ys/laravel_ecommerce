<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class slider extends Controller
{
    public function add(){
        return view('slider.add_slider');
     }
     public function save_slider(Request $request){
        $data = array();
         $data['slider_name']= $request->slider_name;
         $data['slider_desc']= $request->slider_desc;
         $data['slider_status']= $request->slider_status;
         $get_image = $request->file('slider_image');
        if ( $data['slider_name'] == "" ||  $data['slider_desc'] == ""||$get_image == "" ) {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{
         $name_name = $get_image->getClientOriginalName();
         $ta = current(explode('.',$name_name));
          $path = 'public/uploads/';
          $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
          $get_image->move($path,$name);
          $data['slider_image'] = $name;
            $result = DB::table('tbl_slider')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_slider')->get();
        $all = view('slider.all_slider')->with('slider',$select);
        return view('layouts_admin')->with('slider.all_slider',$all);
     }
     
     public function active($id){
         
        $select = DB::table('tbl_slider')->where('slider_id',$id)->update(['slider_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_slider')->where('slider_id',$id)->update(['slider_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_slider')->where('slider_id',$id)->get();
        $all = view('slider.edit_slider')->with('slider',$select);
        return view('layouts_admin')->with('slider.edit_slider',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        $data['slider_name']= $request->slider_name;
        $data['slider_desc']= $request->slider_desc;
        $get_image = $request->file('slider_image');
        if ($get_image != null ) {
         $name_name = $get_image->getClientOriginalName();
         $ta = current(explode('.',$name_name));
          $path = 'public/uploads/';
          $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
          $get_image->move($path,$name);
          $data['slider_image'] = $name;
     
              
        $result = DB::table('tbl_slider')->where('slider_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
      }else{
         $result1a = DB::table('tbl_slider')->where('slider_id',$id)->update($data);
         return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
      }
     }
     public function delete($id){
         
        $select = DB::table('tbl_slider')->where('slider_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
