<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class product extends Controller
{
    public function add(){
        $category = DB::table('tbl_category')->get();
        $brand =  DB::table('tbl_brand')->get();
        return view('product.add_product')->with('category',$category)->with('brand',$brand);
     }
     public function save_product(Request $request){
        $data = array();
         $data['product_name']= $request->product_name;
         $data['product_desc']= $request->product_desc;
         $data['product_content']= $request->product_content;
         $data['product_price']= $request->product_price;
         $data['product_quantity']= $request->product_quantity;
         $data['category_id']= $request->category_id;
         $data['brand_id']= $request->brand_id;
         $data['product_code'] = substr(md5(microtime()),rand(0,26),5);
         $data['product_status']= $request->product_status;
         
         $get_image = $request->file('product_image');

         if ($data['product_name'] == "" || $data['product_desc']  == ""||  $data['product_content']  == "" || $data['product_price'] == ""
         || $data['product_quantity'] == "" ||$get_image == "" ) {
                return redirect()->back()->with('mess','Khong duoc bo trong cac truong tren');
         }
        if ($get_image != null) {
            $name_name = $get_image->getClientOriginalName();
            $ta = current(explode('.',$name_name));
             $path = 'public/uploads/';
             $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
             $get_image->move($path,$name);
             $data['product_image'] = $name;
        
                $result = DB::table('tbl_product')->insertGetId($data);
                Session::put('product_id',$result);
                if ($result) {
                    $get_images = $request->file('product_images');
                    if ($get_images) {
                        $data1 = array();
                        foreach($get_images as $key => $val){

                            $name_name1 = $val->getClientOriginalName();
                            $ta1 = current(explode('.',$name_name1));
                             $path1 = 'public/uploads/';
                             $name1 = $ta1.rand().'.' .$val->getClientOriginalExtension();
                             $val->move($path1,$name1);
                             $data1['product_id'] = Session::get('product_id');
                             $data1['image'] =  $name1 ;
                            DB::table('image_product')->insert($data1);
                        }
                    }
                    return redirect()->back()->with('mess','Thêm sản phẩm thành công');
                }else{
                  return redirect()->back()->with('mess','Thêm sản phẩm thất bại');
                }
           
             
            }


        
     }
     public function show(){
         
        $select = DB::table('tbl_product')
        ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->orderBy('tbl_product.product_id','desc')
        ->get();
        $all = view('product.all_product')->with('product',$select);
        return view('layouts_admin')->with('product.all_product',$all)  ;
     }
     public function active($id){
         
        $select = DB::table('tbl_product')->where('product_id',$id)->update(['product_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_product')->where('product_id',$id)->update(['product_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
      $category = DB::table('tbl_category')->get();
      $brand =  DB::table('tbl_brand')->get();
      $img =  DB::table('image_product')->where('product_id',$id)->get();
      $select = DB::table('tbl_product')
       
      ->join('tbl_category','tbl_category.category_id','=','tbl_product.category_id')
      ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
      ->orderBy('tbl_product.product_id','desc')->where('tbl_product.product_id',$id)
      ->get();
        $all = view('product.edit_product')
        ->with('product',$select)
        ->with('image',$img)
        ->with('category',$category)
        ->with('brand',$brand);;
        return view('layouts_admin')->with('product.edit_product',$all);
     }
     public function edit($id,Request $request){
      $data = array();
      $data['product_name']= $request->product_name;
      $data['product_desc']= $request->product_desc;
      $data['product_content']= $request->product_content;
      $data['product_price']= $request->product_price;
    
      $data['category_id']= $request->category_id;
      $data['brand_id']= $request->brand_id;
      $data['product_code'] = substr(md5(microtime()),rand(0,26),5);
       
      
      $get_image = $request->file('product_image');
      $get_images = $request->file('product_images');
      if ($get_image != null ) {
         $name_name = $get_image->getClientOriginalName();
         $ta = current(explode('.',$name_name));
          $path = 'public/uploads/';
          $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
          $get_image->move($path,$name);
          $data['product_image'] = $name;
     
             $result = DB::table('tbl_product')->where('product_id',$id)->update($data);
             if ($get_images != null ) {
               DB::table('image_product')->where('product_id',$id)->delete();
               $data1 = array();
               foreach($get_images as $key => $val){
   
                   $name_name1 = $val->getClientOriginalName();
                   $ta1 = current(explode('.',$name_name1));
                    $path1 = 'public/uploads/';
                    $name1 = $ta1.rand().'.' .$val->getClientOriginalExtension();
                    $val->move($path1,$name1);
                    $data1['product_id'] = $id;
                    $data1['image'] =  $name1 ;
                   DB::table('image_product')->insert($data1);
                            
             }
               
             }
             if (  $result) {
               return redirect()->back()->with('mess','cập nhật sản phẩm thành công');
            
             }else{
               return redirect()->back()->with('mess','cập nhật sản phẩm thaa');
             }
             
      }else{
         $result1a = DB::table('tbl_product')->where('product_id',$id)->update($data);
         if ($get_images != null ) {
            DB::table('image_product')->where('product_id',$id)->delete();
            $data1 = array();
            foreach($get_images as $key => $val){

                $name_name1 = $val->getClientOriginalName();
                $ta1 = current(explode('.',$name_name1));
                 $path1 = 'public/uploads/';
                 $name1 = $ta1.rand().'.' .$val->getClientOriginalExtension();
                 $val->move($path1,$name1);
                 $data1['product_id'] = $id;
                 $data1['image'] =  $name1 ;
                DB::table('image_product')->insert($data1);
                         
          }
            
          }
         if ($result1a) {
            return redirect()->back()->with('mess','cập nhật sản phẩm thành công');
         }
      }
               

     }
     public function delete($id){
         
        $select = DB::table('tbl_product')->where('product_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
