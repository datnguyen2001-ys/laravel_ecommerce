<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'customer_id','shipping_id', 'order_status','order_code','created_at' 
        
    
    ];
    protected $table = 'tbl_order';
    protected $primaryKey = 'order_id';
}
