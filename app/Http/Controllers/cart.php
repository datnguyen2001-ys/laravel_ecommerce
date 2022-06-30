<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use Session;
use App\Coupon_product;
use Carbon;
class cart extends Controller
{


    public function save_order(Request $request){
        $data = $request->all();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        foreach(Session::get('coupon') as $key => $val){
            $cou = $val['coupon_code'];
        }
         $coupon = Coupon_product::where('coupon_code', $cou)->first();
         $coupon->coupon_quantity = $coupon->coupon_quantity - 1;
         $coupon->save();
         

        if ($data['shipping_name'] == "" || $data['shipping_address'] == "" || $data['shipping_phone'] == ""
        || $data['shipping_email'] == "" ) {
             return redirect()->back()->with('mess','không được bỏ trống các ô dữ liệu');
        }else{
            $data1 = array();
            $data1['shipping_name'] = $data['shipping_name'];
            $data1['shipping_address'] = $data['shipping_address'];
            $data1['shipping_phone'] = $data['shipping_phone'];
            $data1['shipping_email'] = $data['shipping_email'];
            $data1['shipping_notes'] = $data['shipping_notes'];
            $data1['shipping_method'] = $data['shipping_method'];
    
            $shipping_id = DB::table('tbl_shipping')->insertGetId($data1);
            $order_code = substr(md5(microtime()),rand(0,26),5);
            //them order
            $select = Session::get('email');
            $select1 = DB::table('users')->where('email',$select)->get();
            foreach($select1 as $key => $val){
                    $id_us = $val->id;
            }
            $data2 = array();
            $data2['customer_id'] =  $id_us ;
            $data2['shipping_id'] =   $shipping_id;
            $data2['order_status'] = 1;
            $data2['order_code'] = $order_code;
            $data2['created_at'] = now();
            DB::table('tbl_order')->insert($data2);
            //order_details
            $data3 = array();
             
            if(Session::get('cart')){
                foreach(Session::get('cart') as $key => $val){
    
                    $data3['order_code'] =  $order_code ;
                    $data3['product_id'] =  $val['product_id'];
                    $data3['product_name'] =  $val['product_name'];
                    $data3['product_price'] =  $val['product_price'];
                    $data3['product_sales_quantity'] =  $val['product_quantity'];
                    $data3['product_coupon']  =$cou;
                    $data3['product_feeship'] =  Session::get('transport');
                   
                    DB::table('tbl_order_details')->insert($data3);
                }
            }
            $request->session()->forget('cart');
            $request->session()->forget('coupon');
            $request->session()->forget('transport');
            return redirect()->back()->with('mess_order','Đơn hàng được đặt thành công!Cảm ơn bạn ');
           
        }
 
    }
    public function save_cart(Request $request){
        $data = $request->all();
        
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $i = 0;
            foreach($cart as $key => $val){
                if($val['product_id'] == $data['cart_product_id']){
                    $i++;
                    $cart[$key] = array(
                    'session_id' => $val['session_id'],
                    'product_name' => $val['product_name'],
                    'product_id' => $val['product_id'],
                    'product_image' => $val['product_image'],
                    'product_qty' => $val['product_qty'],
                    'product_quantity' => $val['product_quantity'] + $data['cart_product_qty'],
                    'product_price' => $val['product_price'],

                    );

                    Session::put('cart',$cart);
                }
            }
            if($i == 0){
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id'=>$data['cart_product_id'],
                    'product_name'=>$data['cart_product_name'],
                    'product_image'=>$data['cart_product_image'],
                    'product_price'=>$data['cart_product_price'],

                    'product_qty' => $data['cart_product_quantity'],
                    'product_quantity'=>$data['cart_product_qty'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id'=>$data['cart_product_id'],
                'product_name'=>$data['cart_product_name'],
                'product_image'=>$data['cart_product_image'],
                'product_price'=>$data['cart_product_price'],
                'product_qty' => $data['cart_product_quantity'],
                'product_quantity'=>$data['cart_product_qty'],
            );
            Session::put('cart',$cart);
        }
        session::save();
        
    }
    public function show_cart(Request $request){
        $tp = DB::table('tbl_tinhthanhpho')->get();
        $cate = DB::table('tbl_category')->get();
        $contact =  DB::table('tbl_contact')->get();
        return view('pages.cart')
        ->with('tp',$tp)
        ->with('contact',$contact)
        ->with('cate',$cate);

    }
    public function delete_cart($id,Request $request){
        $cart = Session::get('cart');
        if ($cart == true) {
           foreach($cart as $key => $carts){
                if($carts['session_id'] == $id){
                    unset($cart[$key]);
                
                }
           }
        }
        if($cart == null){
            $request->session()->forget('coupon');
            $request->session()->forget('transport');
        }
        Session::put('cart',$cart);
        Session::save();
        return redirect()->back();
    }
    public function count_cart(Request $request){
        $cart = Session::get('cart');
        $output = '';
        if ($cart == true) {
            $c = count(Session::get('cart'));
            if ($c > 0) {
               $output.= '
               <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">'.$c.'</span> ';
            }else{
                $output.= ' <i class="fas fa-shopping-cart text-primary"></i>
                    <span class="badge">0</span> ';
            }
        }else{
            $output.= ' <i class="fas fa-shopping-cart text-primary"></i>
            <span class="badge">0</span> ';
        }
         
        echo $output;

    }
    public function update_quantity(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
             foreach($data['pro_qty'] as $key => $qty){
                //$key la session_id
                foreach($cart as $session => $value){
                    if ($value['session_id'] == $key) {
                        if ($qty <= $cart[$session]['product_qty']) {
                            $cart[$session]['product_quantity'] = $qty;
                             
                        }else{
                            return redirect()->back()->with('mess1','số lượng đặt nhỏ hơn hoặc bằng số lượng kho');

                        }
                    }
                }
             }
             Session::put('cart',$cart);
             Session::save();
             return redirect()->back()->with('mess','cập nhật thành công');
        }else{
            return redirect()->back()->with('mess','cập nhật thất bại');
        }
     
    }
    public function delete_all_cart(Request $request){
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach($cart as $session => $value){
                $request->session()->forget('cart');
                return redirect()->back();
            }
        }
    }
    public function  check_coupon(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date =  date('d-m-Y');
        
        $data = $request->all();

        $code = $data['coupon_code'];
        if ($code == "") {
            return redirect()->back()->with('mess_error','vui lòng nhập mã giảm giá');
        }
        $result = DB::table('tbl_coupon')
        ->where('coupon_code',$code)
        ->where('coupon_status',0)
        
        ->get();
        if ($result) {
            $c = $result->count();
             if ( $c  > 0) {
                foreach($result as $key1 => $val){
                    $newDate = date("d-m-Y", strtotime($val->coupon_end));
                    if (strtotime($date) <= strtotime($newDate)) {
                        $coupon_sess = Session::get('coupon');
                        if ($coupon_sess == true) {
                             $i = 0;
                             if ( $i ==0) {
                                foreach($result as $key => $results){
        
                                    $coupon[] = array(
                                        'coupon_method' => $results->coupon_method,
                                        'coupon_number' => $results->coupon_number,
                                        'coupon_code' => $results->coupon_code,
                                    );
                                    Session::put('coupon',$coupon);
                                }
                                return redirect()->back()->with('mess','mã giảm giá đã được chọn');
                             }
                        }else{
                            foreach($result as $key => $results){
        
                                $coupon[] = array(
                                    'coupon_method' => $results->coupon_method,
                                    'coupon_number' => $results->coupon_number,
                                    'coupon_code' => $results->coupon_code,
                                );
                                Session::put('coupon',$coupon);
                            }
                            return redirect()->back()->with('mess','mã giảm giá đã được chọn');
                        }
                      }else{
                        return redirect()->back()->with('mess_error','mã giảm giá hết hạn ');
                      }
                }
                
             }else{
                $request->session()->forget('coupon');
                return redirect()->back()->with('mess_error','mã giảm giá không đúng ');
            }
        } 
      
        Session::save();
        return redirect()->back();
    }
    
    public function check_transport(Request $request){
      $data = $request->all();
      $tp = $data['transport_matp'];
      $qh = $data['transport_maqh'];
      $xa = $data['transport_xaid'];
      
      if (empty( $tp) || empty($qh) || empty($xa)) {
        return redirect()->back()->with('mess','vui lòng chọn đầy đủ');
      }else{
        $result = DB::table('tbl_transport')
        ->where('transport_matp',$tp)
        ->where('transport_maqh',$qh)
        ->where('transport_xaid',$xa)
        ->get();
        if ($result) {
             foreach( $result as $key => $value){
                    Session::put('transport',$value->transport_feeship);
                    return redirect()->back()->with('mess','phí vận chuyển đã được tính');
             }
        } 
      }
      Session::save();
      return redirect()->back();
    }
    public function check_out(Request $request){
        $contact =  DB::table('tbl_contact')->get();
        
        $cate = DB::table('tbl_category')->get();
        return view('pages.check-out')
        ->with('cate',$cate)
        ->with('contact',$contact);
    }
    public function modal_view(Request $request){
        $data = $request->all();
        $out = '';
        $key = $data['id'];
        $result = DB::table('tbl_product')
        ->where('product_id',$key)
        ->get();
        $out.= ' <div class="table-responsive">  
        <table class="table table-bordered">';  
        foreach( $result as $key => $value){
            $out .= '  
            <tr>  
                 <td width="30%"><label>Tên sản phẩm</label></td>  
                 <td width="70%">' .$value->product_name.'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>Mô tả</label></td>  
                <td width="70%">'.$value->product_desc.'</td>  
             </tr>  
             <tr>  
                <td width="30%"><label>ảnh</label></td>  
                <td width="70%"> <img style="height: 150px" src="./public/uploads/'.$value->product_image.' " alt=""></td> 
                   
            </tr>  
            <tr>  
                 <td width="30%"><label>giá</label></td>  
                 <td width="70%">'.number_format($value->product_price,0,',','.').' '.'đ'.'</td>  
            </tr>  
            
             
           
            ';  
        }
        $out.= ' </table>
        </div>
      ';
        echo $out;
    }
    public function modal_view1(Request $request){
        $data = $request->all();
        $out = '';
        $key = $data['id'];
        $result = DB::table('tbl_product')
        ->where('product_id',$key)
        ->get();
        $out.= ' <div class="table-responsive">  
        <table class="table table-bordered">';  
        foreach( $result as $key => $value){
            $out .= '  
            <tr>  
                 <td width="30%"><label>Tên sản phẩm</label></td>  
                 <td width="70%">' .$value->product_name.'</td>  
            </tr>  
            <tr>  
                <td width="30%"><label>Mô tả</label></td>  
                <td width="70%">'.$value->product_desc.'</td>  
             </tr>  
             <tr>  
                <td width="30%"><label>ảnh</label></td>  
                <td width="70%"> <img style="height: 150px" src="../public/uploads/'.$value->product_image.' " alt=""></td> 
                   
            </tr>  
            <tr>  
                 <td width="30%"><label>giá</label></td>  
                 <td width="70%">'.number_format($value->product_price,0,',','.').' '.'đ'.'</td>  
            </tr>  
            
             
           
            ';  
        }
        $out.= ' </table>
        </div>
      ';
        echo $out;
    }
}
 