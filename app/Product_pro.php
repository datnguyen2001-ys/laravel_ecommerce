<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_pro extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_name','product_desc', 'product_content'
        , 'product_price','product_quantity','category_id'
        ,'brand_id','product_status','product_image','product_code',
        'product_sold'
    
    ];
    protected $primaryKey = 'product_id';
    protected $table = 'tbl_product';
}
