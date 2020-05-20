<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $guarded=[];
    
    #Relations
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
