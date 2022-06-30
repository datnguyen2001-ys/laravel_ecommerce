<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
class home_controller extends Controller
{
   public function search_autocomplete(Request $request){
      $data = $request->all();
      $output = '';
      $key = $data['key_word'];
      $result = DB::table('tbl_product')->where('product_name','like',$key.'%')->get();
    
         $output .= '<ul class="dropdown-menu " style="display:block;text-align:centen" >';
         foreach( $result as $key => $value){
            $output .= '<li style="margin-left:20px" class="li_search"><a href="#"> '.$value->product_name .'<a> </li>';
         }
         $output .= '</ul>';
      

      echo $output;
   }
     public function index(){
        $cate = DB::table('tbl_category')->get();
        $slider = DB::table('tbl_slider')->where('slider_status',1)->get();
        $cate_sta = DB::table('tbl_category')->where('category_status',1)->get();

        $pro = DB::table('tbl_product')->limit(8)->get();
        $pro1 = DB::table('tbl_product')->skip(8)->take(8)->get();
         $contact =  DB::table('tbl_contact')->get();
        return view('pages.base')
        ->with('slider',$slider)
        ->with('contact',$contact)
        ->with('cate_sta',$cate_sta)
        ->with('pro',$pro)
        ->with('pro1',$pro1)
        ->with('cate',$cate);
     }
      
      public function layout_login(){
      return view('pages.login');
      }
      public function layout_res(){
      return view('pages.register_acc');
      }

      public function save_cus(Request $request){
         $data = $request->all();
         $data1 = array();
         $data1['name'] = $data['username'];
         $data1['phone'] =  $data['phone'];
         $data1['email'] =  $data['email'];
         $data1['password'] = Hash::make($data['password']);
         $data1['utype'] = 'user';
         if($data1['name'] == "" || $data1['phone'] ==""|| $data1['email'] == "" ||   $data1['password'] ==""){
             return redirect()->back()->with('mess','khong duoc bo trong du lieu');
         }else{
            $check = DB::table('users')->where('email',$data1['email'])->first();
            if($check){
               return redirect()->back()->with('mess','email da ton tai');
            } else{
               $result = DB::table('users')->insert($data1);
               if ($result) {
                  return redirect()->back()->with('mess','them thanh cong');
               }else{
                  return redirect()->back()->with('mess','them that bai');
               }
            }
         }
         
         

      }
      
      public function login_account(Request $request){
         $data = $request->all();
         
         $email = $data['email'];
         $password = $data['password'];
         if ( $email == "" ||  $password == "") {
            return redirect()->back()->with('mess','khong duoc bo trong');
         }
         if(Auth::attempt(['email' => $email, 'password' => $password,'utype' =>'user'])){
            Session::put('email',$email);
            return redirect('/index');
         }else{
            return redirect()->back()->with('mess','email hoac mat khau khong dung');
         }

      }
      public function logout(Request $request){
            $request->session()->forget('cart');
            Session::forget('email');
            return redirect()->back();
      }
      public function shop(Request $request){
         $cate = DB::table('tbl_category')->get();
         $brand = DB::table('tbl_brand')->get();
         $contact =  DB::table('tbl_contact')->get();
          
         if (isset($_GET['key'])) {
            # code...
            $data =$request->all();
            $key = $data['key'];
            $cate = DB::table('tbl_category')->get();
            $pro = DB::table('tbl_product')->where('product_name','like',$key.'%')->paginate(6)
            ->appends(request()->query());
           
            
          
      }elseif(isset($_GET['brand'])){
         $se = $_GET['brand'];
         $fi = explode(",",$se);
         $pro = DB::table('tbl_product')
         ->whereIn('brand_id',$fi)
         ->paginate(6)
         ->appends(request()->query());
      }
      elseif(isset($_GET['cate'])){
         $se = $_GET['cate'];
         $fi = explode(",",$se);
         $pro = DB::table('tbl_product')
         ->whereIn('category_id',$fi)
         ->paginate(6)
         ->appends(request()->query());
      }
      else{
         $pro = DB::table('tbl_product')->paginate(6);
     }
        
        
          if (isset($_GET['sort_by']) && isset($_GET['key']) ) {
               $filter = $_GET['sort_by'];
               $key = $_GET['key'];
               if ($filter == 'tang_dan') {
                  $pro =  DB::table('tbl_product')
                  ->where('product_name','like',$key.'%')  
                  ->orderBy('product_price','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'giam_dan'){
                  $pro =  DB::table('tbl_product')
                  ->where('product_name','like',$key.'%')
                  ->orderBy('product_price','DESC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'a_z'){
                  $pro =  DB::table('tbl_product')
                  ->where('product_name','like',$key.'%')
                  ->orderBy('product_name','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'z_a'){
                  $pro =  DB::table('tbl_product')
                  ->where('product_name','like',$key.'%')
                  ->orderBy('product_name','DESC')
                  ->paginate(6)->appends(request()->query());
               }
   
            }elseif(isset($_GET['sort_by']) && isset($_GET['brand'])){
               $filter = $_GET['sort_by'];
               $se = $_GET['brand'];
               $fi = explode(",",$se);
               if ($filter == 'tang_dan') {
                  $pro =  DB::table('tbl_product')
                  ->whereIn('brand_id',$fi)
                  ->orderBy('product_price','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'giam_dan'){
                  $pro =  DB::table('tbl_product')
                  ->whereIn('brand_id',$fi)
                  ->orderBy('product_price','DESC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'a_z'){
                  $pro =  DB::table('tbl_product')
                  ->whereIn('brand_id',$fi)
                  ->orderBy('product_name','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'z_a'){
                  $pro =  DB::table('tbl_product')
                  ->whereIn('brand_id',$fi)
                  ->orderBy('product_name','DESC')
                  ->paginate(6)->appends(request()->query());
               }
            }
            elseif(isset($_GET['sort_by']) && isset($_GET['cate'])){
               $filter = $_GET['sort_by'];
               $se = $_GET['cate'];
               $fi = explode(",",$se);
               if ($filter == 'tang_dan') {
                  $pro =  DB::table('tbl_product')
                  ->whereIn('category_id',$fi)
                  ->orderBy('product_price','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'giam_dan'){
                  $pro =  DB::table('tbl_product')
                  ->whereIn('category_id',$fi)
                  ->orderBy('product_price','DESC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'a_z'){
                  $pro =  DB::table('tbl_product')
                  ->whereIn('category_id',$fi)
                  ->orderBy('product_name','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'z_a'){
                  $pro =  DB::table('tbl_product')
                  ->whereIn('category_id',$fi)
                  ->orderBy('product_name','DESC')
                  ->paginate(6)->appends(request()->query());
               }
            }
            elseif(isset($_GET['sort_by'])){
               $filter = $_GET['sort_by'];
                
               if ($filter == 'tang_dan') {
                  $pro =  DB::table('tbl_product')
                   
                  ->orderBy('product_price','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'giam_dan'){
                  $pro =  DB::table('tbl_product')
                 
                  ->orderBy('product_price','DESC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'a_z'){
                  $pro =  DB::table('tbl_product')
                 
                  ->orderBy('product_name','ASC')
                  ->paginate(6)->appends(request()->query());
               }elseif($filter == 'z_a'){
                  $pro =  DB::table('tbl_product')
                 
                  ->orderBy('product_name','DESC')
                  ->paginate(6)->appends(request()->query());
               }
            }

          
         $cate = DB::table('tbl_category')->get();
         return view('pages.shop') 
         ->with('contact',$contact)
         ->with('brand',$brand)
         ->with('cate',$cate)
         ->with('pro',$pro)
         ->with('cate',$cate);
   }
   public function shop1($id,Request $request){
      $cate = DB::table('tbl_category')->get();
      $brand = DB::table('tbl_brand')->get();
      $contact =  DB::table('tbl_contact')->get();
      if (isset($_GET['key'])) {
         # code...
         $data =$request->all();
         $key = $data['key'];
         $cate = DB::table('tbl_category')->get();
         $pro = DB::table('tbl_product')->where('product_name','like',$key.'%')->paginate(6)
         ->appends(request()->query());
        
         
       
   }elseif(isset($_GET['brand'])){
      $se = $_GET['brand'];
      $fi = explode(",",$se);
      $pro = DB::table('tbl_product')
      ->whereIn('brand_id',$fi)
      ->paginate(6)
      ->appends(request()->query());
   }
   elseif(isset($_GET['cate'])){
      $se = $_GET['cate'];
      $fi = explode(",",$se);
      $pro = DB::table('tbl_product')
      ->whereIn('category_id',$fi)
      ->paginate(6)
      ->appends(request()->query());
   }
   else{
      $pro = DB::table('tbl_product')
      ->where('category_id',$id)
      ->paginate(6);
  }
     
     
       if (isset($_GET['sort_by']) && isset($id) ) {
            $filter = $_GET['sort_by'];
            
            if ($filter == 'tang_dan') {
               $pro =  DB::table('tbl_product')
               ->where('category_id',$id)  
               ->orderBy('product_price','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'giam_dan'){
               $pro =  DB::table('tbl_product')
               ->where('category_id',$id)
               ->orderBy('product_price','DESC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'a_z'){
               $pro =  DB::table('tbl_product')
               ->where('category_id',$id)
               ->orderBy('product_name','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'z_a'){
               $pro =  DB::table('tbl_product')
               ->where('category_id',$id)
               ->orderBy('product_name','DESC')
               ->paginate(6)->appends(request()->query());
            }

         }elseif(isset($_GET['sort_by']) && isset($_GET['brand'])){
            $filter = $_GET['sort_by'];
            $se = $_GET['brand'];
            $fi = explode(",",$se);
            if ($filter == 'tang_dan') {
               $pro =  DB::table('tbl_product')
               ->whereIn('brand_id',$fi)
               ->orderBy('product_price','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'giam_dan'){
               $pro =  DB::table('tbl_product')
               ->whereIn('brand_id',$fi)
               ->orderBy('product_price','DESC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'a_z'){
               $pro =  DB::table('tbl_product')
               ->whereIn('brand_id',$fi)
               ->orderBy('product_name','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'z_a'){
               $pro =  DB::table('tbl_product')
               ->whereIn('brand_id',$fi)
               ->orderBy('product_name','DESC')
               ->paginate(6)->appends(request()->query());
            }
         }
         elseif(isset($_GET['sort_by']) && isset($_GET['cate'])){
            $filter = $_GET['sort_by'];
            $se = $_GET['cate'];
            $fi = explode(",",$se);
            if ($filter == 'tang_dan') {
               $pro =  DB::table('tbl_product')
               ->whereIn('category_id',$fi)
               ->orderBy('product_price','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'giam_dan'){
               $pro =  DB::table('tbl_product')
               ->whereIn('category_id',$fi)
               ->orderBy('product_price','DESC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'a_z'){
               $pro =  DB::table('tbl_product')
               ->whereIn('category_id',$fi)
               ->orderBy('product_name','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'z_a'){
               $pro =  DB::table('tbl_product')
               ->whereIn('category_id',$fi)
               ->orderBy('product_name','DESC')
               ->paginate(6)->appends(request()->query());
            }
         }
         elseif(isset($_GET['sort_by'])){
            $filter = $_GET['sort_by'];
             
            if ($filter == 'tang_dan') {
               $pro =  DB::table('tbl_product')
                
               ->orderBy('product_price','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'giam_dan'){
               $pro =  DB::table('tbl_product')
              
               ->orderBy('product_price','DESC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'a_z'){
               $pro =  DB::table('tbl_product')
              
               ->orderBy('product_name','ASC')
               ->paginate(6)->appends(request()->query());
            }elseif($filter == 'z_a'){
               $pro =  DB::table('tbl_product')
              
               ->orderBy('product_name','DESC')
               ->paginate(6)->appends(request()->query());
            }
         }

       
      $cate = DB::table('tbl_category')->get();
      return view('pages.shop') 
      ->with('contact',$contact)
      ->with('brand',$brand)
      ->with('cate',$cate)
      ->with('pro',$pro)
      ->with('cate',$cate);
}
      public function product_details($id,Request $request){
         $cate = DB::table('tbl_category')->get();
         $contact =  DB::table('tbl_contact')->get();
         $rate = DB::table('tbl_rating')->where('product_id',$id)->avg('rating');
         $rate=round($rate);
         $pro = DB::table('tbl_product')->where('product_id',$id)->get();

         foreach( $pro as $key => $cate_id){
            $product_ByCate = $cate_id->category_id;
         }
         $pro1 = DB::table('tbl_product')->where('category_id',$product_ByCate)
         ->whereNotIn('product_id', [$id])
         ->get();
         $img = DB::table('image_product')->where('product_id',$id)->get();
         return view('pages.product_details')
         ->with('pro',$pro)
         ->with('contact',$contact)
         ->with('rate',$rate)
         ->with('cate',$cate)
         ->with('pro1',$pro1)
         ->with('img',$img);
      }

      public function search_product(Request $request){
         $contact =  DB::table('tbl_contact')->get();
         $data =$request->all();
         $key = $data['key'];
         $cate = DB::table('tbl_category')->get();
         $select = DB::table('tbl_product')->where('product_name','like','%' .$key.'%')->paginate(6)
         ->appends(request()->query());
         return view('pages.search-product') 
         ->with('contact',$contact)
        
         ->with('select',$select)
         ->with('cate',$cate);
      }
      public function selected_address(Request $request){
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

}
