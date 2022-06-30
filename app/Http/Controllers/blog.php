<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
class blog extends Controller
{

    public function blog_category($id,Request $request){
        $cate = DB::table('tbl_category')->get();
        $cate_blog = DB::table('tbl_category_blog')->get();
        $blog = DB::table('tbl_blog')->orderBy('create_at','DESC')->limit(4)->get();
        $blog1 = DB::table('tbl_blog')->where('category_blog_id',$id)->orderBy('create_at','asc')->paginate(6);
        return view('blogs.blog-filter')
        ->with('cate',$cate)
        ->with('blog',$blog)
        ->with('blog1',$blog1)
        ->with('cate_blog',$cate_blog)
        ;
    }
    public function blog_details($id,Request $request){
        $cate = DB::table('tbl_category')->get();
        $cate_blog = DB::table('tbl_category_blog')->get();
        $blog = DB::table('tbl_blog')->orderBy('create_at','DESC')->limit(4)->get();
        $blog1 = DB::table('tbl_blog')->where('blog_id',$id)->get();
        foreach( $blog1 as $key => $value){
            $category_bl = $value->category_blog_id;
        }
        $rt = DB::table('tbl_blog')->where('category_blog_id',$category_bl)->whereNotIn('blog_id',[$id])->get();
        return view('blogs.blog-details')
        ->with('cate',$cate)
        ->with('rt',$rt)
        ->with('blog',$blog)
        ->with('blog1',$blog1)
        ->with('cate_blog',$cate_blog)
        ;

    }
    public function index(){
        if (isset($_GET['key']) && $_GET['key'] != null) {
             $key  =  $_GET['key'];
             $blog1 = DB::table('tbl_blog')->where('blog_name','like',$key.'%')->orderBy('create_at','asc')->paginate(6);
        }else{
            $blog1 = DB::table('tbl_blog')->orderBy('create_at','asc')->paginate(6);
        }
        $cate = DB::table('tbl_category')->get();
        $cate_blog = DB::table('tbl_category_blog')->get();
        $blog = DB::table('tbl_blog')->orderBy('create_at','DESC')->limit(4)->get();
        $contact =  DB::table('tbl_contact')->get();
        return view('blogs.blog')
        ->with('cate',$cate)
        ->with('blog',$blog)
        ->with('blog1',$blog1)
        ->with('cate_blog',$cate_blog)
        ->with('contact',$contact)
        ;
     }
    public function add(){
        $cate = DB::table('tbl_category_blog')->get();

        return view('blog.add_blog')
        ->with('cate',$cate)
        ;
     }
     public function save_blog(Request $request){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
         $data['blog_name']= $request->blog_name;
         $data['blog_desc']= $request->blog_desc;
         $data['blog_content']= $request->blog_content;
         $data['category_blog_id']= $request->category_blog_id;
         $data['blog_status']= $request->blog_status;
         $data['create_at']= now();
         $get_image = $request->file('blog_image');

         if ($data['blog_name'] == "" || $data['blog_desc']  == ""||  $data['blog_content']  == "" 
        ||$get_image == "" ) {
                return redirect()->back()->with('mess','Khong duoc bo trong cac truong tren');
         }
        if ($get_image != null) {
            $name_name = $get_image->getClientOriginalName();
            $ta = current(explode('.',$name_name));
             $path = 'public/uploads/';
             $name = $ta.rand().'.' .$get_image->getClientOriginalExtension();
             $get_image->move($path,$name);
             $data['blog_image'] = $name;
        
                $result = DB::table('tbl_blog')->insert($data);
                
                 
                    return redirect()->back()->with('mess','Thêm sản phẩm thành công');
                }else{
                  return redirect()->back()->with('mess','Thêm sản phẩm thất bại');
                }
           
             
            
     }
     public function show(){
         
        $select = DB::table('tbl_blog')->get();
        $all = view('blog.all_blog')->with('blog',$select);
        return view('layouts_admin')->with('blog.all_blog',$all);
     }
     public function active($id){
         
        $select = DB::table('tbl_blog')->where('blog_id',$id)->update(['blog_status' => 1]) ;
        if ($select) {
            
            return redirect()->back();
       }else{
           
            return redirect()->back();
       }
     }
     public function unactive($id){
         
        $select = DB::table('tbl_blog')->where('blog_id',$id)->update(['blog_status' => 0]) ;
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
     public function render_edit($id){
         
        $select = DB::table('tbl_blog')->where('blog_id',$id)->get();
        $all = view('blog.edit_blog')->with('blog',$select);
        return view('layouts_admin')->with('blog.edit_blog',$all);
     }
     public function edit($id,Request $request){
        $data = array();
        $data['blog_name']= $request->blog_name;
        $data['blog_content']= $request->blog_content;

        $result = DB::table('tbl_blog')->where('blog_id',$id)->update($data);

        if ($result) {
             
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thành công');
         }else{
            return redirect()->back()->with('mess_succ','Thêm danh mục sản phẩm thất bại');
         }
         
       
     }
     public function delete($id){
         
        $select = DB::table('tbl_blog')->where('blog_id',$id)->delete();
        if ($select) {
             
             return redirect()->back();
        }else{
            
             return redirect()->back();
        }
     }
}
