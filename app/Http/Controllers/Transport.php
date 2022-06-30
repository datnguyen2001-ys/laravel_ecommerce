<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class Transport extends Controller
{
    
   public function select_address(Request $request){
      $data = $request->all();
      if ($data['action']) {
         $output = '';
          if ($data['action'] == 'thanhpho') {
               $result = DB::table('tbl_quanhuyen')->where('matp',$data['id'])->get();
               $output.='<option>---Chọn quận huyện---</option>';
                   foreach($result as $key => $value){
                        $output.=' <option value="'. $value->maqh .'">'. $value->name_quanhuyen.' </option>';
                   }
               
          }else{

            $result1 = DB::table('tbl_xaphuongthitran')->where('maqh',$data['id'])->get();
            $output.='<option>---Chọn xã phường---</option>';
            foreach($result1 as $key1 => $ward){
               $output.='<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
            }
         }
    
 
         echo $output;
         } 
   }
    public function add(){
        $tp = DB::table('tbl_tinhthanhpho')->get();
        return view('transport.add_transport')->with('tp',$tp);
     }
     public function save_transport(Request $request){
        $data = array();
         $data['transport_matp']= $request->transport_matp;
         $data['transport_maqh']= $request->transport_maqh;
         $data['transport_xaid']= $request->transport_xaid;
         $data['transport_feeship']= $request->transport_feeship;
        if ( $data['transport_matp'] == "" ||  $data['transport_maqh'] == "" || $data['transport_feeship'] == "" ) {
            return redirect()->back()->with('mess_succ','Không được bỏ trống dữ liệu');
        }else{

            $result = DB::table('tbl_transport')->insert($data);
            if ($result) {
             
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
            }else{
               return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
            }
        }
     }
     public function show(){
         
        $select = DB::table('tbl_transport')->get();
        $all = view('transport.all_transport')->with('transport',$select);
        return view('layouts_admin')->with('transport.all_transport',$all);
     }
     public function active($id){
         
        $select = DB::table('tbl_transport')->where('transport_id',$id)->update(['transport_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_transport')->where('transport_id',$id)->update(['transport_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_transport')->where('transport_id',$id)->get();
        $all = view('transport.edit_transport')->with('transport',$select);
        return view('layouts_admin')->with('transport.edit_transport',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        
        $data['transport_feeship']= $request->transport_feeship;

        $result = DB::table('tbl_transport')->where('transport_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
       
     }
     public function delete($id){
         
        $select = DB::table('tbl_transport')->where('transport_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
