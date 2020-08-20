<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
  protected $guarded = [];
  public $product;

  public function products()
  {
    return $this->belongsTo(Product::class);
  }

  # Basket's Accessores 
  public function getProductDataAttribute()
  {
    $product = Product::where('id', $this->product_id)->first();
    $this->product = $product;
    return $this->product;
  }



  public static function getUserBaskets()
  {
    $user = auth()->user();
    if ($user != null)
      $clientBaskets = Basket::where([['user_id', $user->id], ['status', '0']])->get();
    else
      $clientBaskets = null;

    return $clientBaskets;
  }




  public static function sumProdcuct($clientBaskets)
  {
    $sum = 0;
    foreach ($clientBaskets as $clientBasket) {
      $sum += ($clientBasket->product_data->price * $clientBasket->count);
    }
    return $sum;
  }

  public static function sumProdcuctDis($clientBaskets)
  {
    $sum = 0;
    foreach ($clientBaskets as $clientBasket) {
      $sum += ($clientBasket->product_data->dis_price * $clientBasket->count);
    }
    return $sum;
  }
}
