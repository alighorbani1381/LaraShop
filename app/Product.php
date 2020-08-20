<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public $categoryName;

	protected $fillable = [
		'name', 'category_id', 'user_id', 'body', 'price', 'discount', 'total', 'brand', 'image', 'status', 'special', 'bestseler'
	];

	#Route Key Name
	public function getRouteKeyName()
	{
		return 'name';
	}

	#Relations

	public function baskets()
	{
		return $this->hasMany(Basket::class);
	}

	public function categories()
	{
		return $this->belongsTo(Category::class);
	}

	public function comment()
	{
		return $this->hasMany(Comment::class);
	}

	public function filters()
	{
		return $this->belongsToMany(Filter::class);
	}

	public function wishList()
	{
		return $this->hasMany(WishList::class);
	}


	#Accessories

	//Get Category of Product
	public function getCatNameAttribute()
	{
		$category = Category::where('id', $this->category_id)->first();
		return $this->categoryName = $category['title'];
	}

	//Stadrad Price for View
	public function getStdPriceAttribute()
	{
		return number_format($this->price);
	}

	//Calculate Discount of Price return($finalPrice)
	public function getDisPriceAttribute()
	{
		if ($this->discount != 0) {
			$finalPer = (100 - $this->discount) / 100;
			$finalPrice = $finalPer * $this->price;
		} else {
			$finalPrice = $this->price;
		}

		return round($finalPrice, 0);
	}

	//Calculate Discount return($discountPrice)
	public function getDisValueAttribute()
	{
		if ($this->discount != 0)
			$disPrice = ($this->discount / 100) * $this->price;
		else
			$disPrice = 0;
		$roundDisPrice = round($disPrice, 0);

		return $roundDisPrice;
	}
	public function getExistedAttribute()
	{
		if ($this->status == '1' && $this->count > 0)
			return true;
		else
			return false;
	}



	# How to get eleqouent object from model and send to view with accesor ::::::::::::::::::::
}
