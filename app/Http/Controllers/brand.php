<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class brand extends Controller
{
    public function add(){
        return view('brand.add_brand');
     }
     public function save_brand(Request $request){
        $data = array();
         $data['brand_name']= $request->brand_name;
         $data['brand_desc']= $request->brand_desc;
         $data['brand_status']= $request->brand_status;
        if ( $data['brand_name'] == "" ||  $data['brand_desc'] == "" ) {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{

            $result = DB::table('tbl_brand')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_brand')->get();
        $all = view('brand.all_brand')->with('brand',$select);
        return view('layouts_admin')->with('brand.all_brand',$all);
     }
     public function active($id){
         
        $select = DB::table('tbl_brand')->where('brand_id',$id)->update(['brand_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_brand')->where('brand_id',$id)->update(['brand_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_brand')->where('brand_id',$id)->get();
        $all = view('brand.edit_brand')->with('brand',$select);
        return view('layouts_admin')->with('brand.edit_brand',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        $data['brand_name']= $request->brand_name;
        $data['brand_desc']= $request->brand_desc;

        $result = DB::table('tbl_brand')->where('brand_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
       
     }
     public function delete($id){
         
        $select = DB::table('tbl_brand')->where('brand_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
