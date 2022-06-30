<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class coupon extends Controller
{
    public function add(){
        return view('coupon.add_coupon');
     }
     public function save_coupon(Request $request){
        $data = array();
         $data['coupon_name']= $request->coupon_name;
         $data['coupon_code']= $request->coupon_code;
         $data['coupon_quantity']= $request->coupon_quantity;
         $data['coupon_number']= $request->coupon_number;
         $data['coupon_method']= $request->coupon_method;
         $data['coupon_start']= $request->coupon_start;
         $data['coupon_end']= $request->coupon_end;
         $data['coupon_status']= $request->coupon_status;
        if ( $data['coupon_name'] == "" ||  $data['coupon_code'] == "" ||
        $data['coupon_quantity'] == "" || $data['coupon_number'] == "" ||
        $data['coupon_start'] == "" || $data['coupon_end'] == "") {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{

            $result = DB::table('tbl_coupon')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_coupon')->get();
        $all = view('coupon.all_coupon')->with('coupon',$select);
        return view('layouts_admin')->with('coupon.all_coupon',$all);
     }
      
     public function render_edit($id){
         
        $select = DB::table('tbl_coupon')->where('coupon_id',$id)->get();
        $all = view('coupon.edit_coupon')->with('coupon',$select);
        return view('layouts_admin')->with('coupon.edit_coupon',$all);
     }
     public function edit($id,Request $request){
        $data = array();
         $data['coupon_name']= $request->coupon_name;
         $data['coupon_code']= $request->coupon_code;
         $data['coupon_quantity']= $request->coupon_quantity;
         $data['coupon_number']= $request->coupon_number;
         $data['coupon_method']= $request->coupon_method;
         $data['coupon_start']= $request->coupon_start;
         $data['coupon_end']= $request->coupon_end;
         $data['coupon_status']= $request->coupon_status;
        $result = DB::table('tbl_coupon')->where('coupon_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
       
     }
     public function delete($id){
         
        $select = DB::table('tbl_coupon')->where('coupon_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
