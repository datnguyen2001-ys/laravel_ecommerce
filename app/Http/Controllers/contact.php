<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class contact extends Controller
{
    public function index(){
        $cate = DB::table('tbl_category')->get();
        $con = DB::table('tbl_contact')->get();
        return view('contact.contact')
        ->with('con',$con)
        
        ->with('cate',$cate);
    }
    public function add(){
        return view('contact.add_contact');
     }
     public function save_contact(Request $request){
        $data = array();
         $data['contact_phone']= $request->contact_phone;
         $data['contact_address']= $request->contact_address;
         $data['contact_time']= $request->contact_time;
         $data['contact_email']= $request->contact_email;
         $data['contact_map']= $request->contact_map;
        if ( $data['contact_phone'] == "" ||  $data['contact_address'] == "" ) {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{

            $result = DB::table('tbl_contact')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_contact')->get();
        $all = view('contact.all_contact')->with('contact',$select);
        return view('layouts_admin')->with('contact.all_contact',$all);
     }
     public function active($id){
         
        $select = DB::table('tbl_contact')->where('contact_id',$id)->update(['contact_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_contact')->where('contact_id',$id)->update(['contact_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_contact')->where('contact_id',$id)->get();
        $all = view('contact.edit_contact')->with('contact',$select);
        return view('layouts_admin')->with('contact.edit_contact',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        $data['contact_phone']= $request->contact_phone;
         $data['contact_address']= $request->contact_address;
         $data['contact_time']= $request->contact_time;
         $data['contact_email']= $request->contact_email;
         $data['contact_map']= $request->contact_map;

        $result = DB::table('tbl_contact')->where('contact_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
       
     }
     public function delete($id){
         
        $select = DB::table('tbl_contact')->where('contact_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
