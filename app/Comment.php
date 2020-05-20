<?php

namespace App;

use Hekmatinasser\Verta\Facades\Verta;
use Hekmatinasser\Verta\Verta as VertaVerta;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /*
        Law About Enum Filed
        shared ([1, 2, 3])
        0=> it means comment wait to accept from admin          False
        1=> it means comment Share to Website                   True
        2=> it means comment Move to Trash                      Trash
    */
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getSubBodyAttribute()
    {
        $words=explode(' ', $this->body);
        foreach($words as $key => $word)
            if($key != 7)
                $specialText[]=$word;
            else
                break;
            

            return implode(" ", $specialText);
    }

    public function getUserAttribute()
    {
        $user=User::find($this->user_id);
        return $user;
    }

    public function getProductAttribute()
    {
        $product=Product::find($this->product_id);
        return $product;
    }

    public function getDifTimeAttribute()
    {
        $time=verta($this->created_at);	
        $diff=$time->formatDifference();
        return $diff;
    }
}
