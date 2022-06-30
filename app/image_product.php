<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_product extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'product_id','image',  
        
    
    ];
    protected $table = 'image_product';
    protected $primaryKey = 'image_product_id ';
}
