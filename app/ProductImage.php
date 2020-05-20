<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable=[
        'product_id','url'
    ];
    
    protected $table='product_images';
    public $timestamps =false;

}
