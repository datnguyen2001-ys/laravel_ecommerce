<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Order_product;
use App\Product_pro;
class order extends Controller
{
   public function index(){
    $order = DB::table('tbl_order')->get(); 
    return view('order.all-order')
    ->with('order',$order)
    ;
   }
   public function view_order($id,Request $request){
    $order = DB::table('tbl_order')
    ->join('tbl_shipping','tbl_shipping.shipping_id','=','tbl_order.shipping_id')
    
    ->where('tbl_order.order_code',$id)->get();  

    $order_det = DB::table('tbl_order')
    ->join('tbl_order_details','tbl_order_details.order_code','=','tbl_order.order_code')
    ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
    ->join('tbl_coupon','tbl_coupon.coupon_code','=','tbl_order_details.product_coupon')
    ->where('tbl_order.order_code',$id)->get();  
    
    return view('order.view-order')
    ->with('order',$order)
    ->with('order_det',$order_det)
    ;
   }
   public function update_order(Request $request){
      $data = $request->all();
      $order = Order_product::find($data['order_id']);
      $order->order_status = $data['id'];
      $order->save();
      if ( $order->order_status == 4) {
          foreach($data['pro_id'] as $key => $val){
            $product = Product_pro::find( $val);
            $quantity = $product->product_quantity;
            $sold = $product->product_sold;
            foreach($data['qty'] as $key1 => $val1){
                  if ($key == $key1) {
                     $tmp =  $quantity - $val1;
                     $product->product_quantity = $tmp;
                     $product->product_sold =  $sold + $val1;
                     $product->save();
                  }
            
            }
            
          }
      }
     
         

   }
}
