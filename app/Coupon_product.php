<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon_product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'coupon_name','coupon_quantity', 'coupon_method'
        , '	coupon_number','coupon_code','coupon_start'
        ,'coupon_end'
    ];
    protected $primaryKey = 'coupon_id';
    protected $table = 'tbl_coupon';
}
