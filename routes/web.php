<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::get('/register_account','Admin@layout_res'); 
Route::get('/login_admin','Admin@layout_login')->name('login_Adm'); 
Route::post('/login_account_adm','Admin@login_account');
 
 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth','admin']],function(){
    Route::get('/index_admin','Admin@index') ;


    //category
    Route::get('/add_category','Category@add' );
    Route::post('/save_category','Category@save_category');
    Route::get('/all_category','Category@show');

    Route::get('/edit_category/{id}','Category@render_edit');
    Route::post('/edit_category_id/{id}','Category@edit');

    Route::get('/active_category/{id}','Category@active');
    Route::get('/unactive_category/{id}','Category@unactive');
    Route::get('/delete_category/{id}','Category@delete');

    //brand
    Route::get('/add_brand','brand@add' );
    Route::post('/save_brand','brand@save_brand');
    Route::get('/all_brand','brand@show');

    Route::get('/edit_brand/{id}','brand@render_edit');
    Route::post('/edit_brand_id/{id}','brand@edit');

    Route::get('/active_brand/{id}','brand@active');
    Route::get('/unactive_brand/{id}','brand@unactive');
    Route::get('/delete_brand/{id}','brand@delete');

    //product
    Route::get('/add_product','product@add' );
    Route::post('/save_product','product@save_product');
    Route::get('/all_product','product@show');

    Route::get('/edit/{id}','product@render_edit');
    Route::post('/edit_product/{id}','product@edit');

    Route::get('/active/{id}','product@active');
    Route::get('/unactive/{id}','product@unactive');
    Route::get('/delete/{id}','product@delete');

    //slider
    Route::get('/add_slider','slider@add' );
    Route::post('/save_slider','slider@save_slider');
    Route::get('/all_slider','slider@show');

    Route::get('/edit_slider/{id}','slider@render_edit');
    Route::post('/edit_slider_id/{id}','slider@edit');

    Route::get('/active_slider/{id}','slider@active');
    Route::get('/unactive_slider/{id}','slider@unactive');
    Route::get('/delete_slider/{id}','slider@delete');

    //coupon
    Route::get('/add_coupon','coupon@add' );
    Route::post('/save_coupon','coupon@save_coupon');
    Route::get('/all_coupon','coupon@show');

    Route::get('/edit_coupon/{id}','coupon@render_edit');
    Route::post('/edit_coupon_id/{id}','coupon@edit');

    // Route::get('/active_coupon/{id}','coupon@active');
    // Route::get('/unactive_coupon/{id}','coupon@unactive');
    Route::get('/delete_coupon/{id}','coupon@delete');

    //transport
    Route::post('/select-address','Transport@select_address');
    Route::get('/add_transport','Transport@add' );
    Route::post('/save_transport','Transport@save_transport');
    Route::get('/all_transport','Transport@show');

    Route::get('/edit_transport/{id}','Transport@render_edit');
    Route::post('/edit_transport_id/{id}','Transport@edit');

     
    Route::get('/delete_transport/{id}','Transport@delete');

    //category_blog
    Route::get('/add_category_blog','category_blog@add' );
    Route::post('/save_category_blog','category_blog@save_category_blog');
    Route::get('/all_category_blog','category_blog@show');

    Route::get('/edit_category_blog/{id}','category_blog@render_edit');
    Route::post('/edit_category_blog_id/{id}','category_blog@edit');

    Route::get('/active_category_blog/{id}','category_blog@active');
    Route::get('/unactive_category_blog/{id}','category_blog@unactive');
    Route::get('/delete_category_blog/{id}','category_blog@delete');

    //blog
    Route::get('/add_blog','blog@add' );
    Route::post('/save_blog','blog@save_blog');
    Route::get('/all_blog','blog@show');

    Route::get('/edit_blog/{id}','blog@render_edit');
    Route::post('/edit_blog_id/{id}','blog@edit');

    Route::get('/active_blog/{id}','blog@active');
    Route::get('/unactive_blog/{id}','blog@unactive');
    Route::get('/delete_blog/{id}','blog@delete');

    //contact
    Route::get('/add_contact','contact@add' );
    Route::post('/save_contact','contact@save_contact');
    Route::get('/all_contact','contact@show');

    Route::get('/edit_contact/{id}','contact@render_edit');
    Route::post('/edit_contact_id/{id}','contact@edit');

   
    Route::get('/delete_contact/{id}','contact@delete');

    //order
    Route::get('/all_order','order@index');
    Route::get('view-order/{id}','order@view_order');
    Route::post('update_order','order@update_order');
     

});

    Route::post('/modal-view1','cart@modal_view1');
    Route::post('/modal-view','cart@modal_view');
    Route::get('/delete-cart/{id}','cart@delete_cart');
    Route::post('/update-quantity','cart@update_quantity');
    Route::get('/delete-all-cart','cart@delete_all_cart');
    Route::post('/check-coupon','cart@check_coupon');
    
    Route::post('/check-transport','cart@check_transport');
    
    Route::post('/save-order','cart@save_order');
 

Route::group(['middleware'=>['checklogin']],function(){
    Route::get('/show-cart','cart@show_cart') ;
    Route::get('/check-out','cart@check_out');
    Route::post('/save-cart','cart@save_cart');
});
Route::get('/count-cart','cart@count_cart');
//page
Route::get('/index','home_controller@index');
Route::get('/register_account','home_controller@layout_res'); 
Route::post('/register_save_cus','home_controller@save_cus'); 
Route::get('/login_cus','home_controller@layout_login') ;
Route::get('/logout','home_controller@logout');
Route::post('/selected-address','home_controller@selected_address');
// ->name('login_Adm'); 
Route::post('/login_account','home_controller@login_account');
Route::get('/shop','home_controller@shop');
Route::get('/product_details/{id}','home_controller@product_details');

Route::post('/search-autocomplete','home_controller@search_autocomplete');


Route::get('/search-product','home_controller@shop');
Route::get('/category-byId/{id}','home_controller@shop1');

//blog

Route::get('/blog','blog@index');
Route::get('/blog-details/{id}','blog@blog_details');
Route::get('blog-category/{id}','blog@blog_category');

//contact
Route::get('/contact','contact@index');

 