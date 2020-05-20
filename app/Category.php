<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public $subsetName;
    public $proper_subset;
    protected $fillable=['title','subset',];

    #Accesorice for Get Subset name of any Category
    public function getMainCategoryNameAttribute(){
        if($this->subset==0){
            $this->subsetName= "سرگروه";
        }
        else{
            $target_cat=Category::find($this->subset);
            $this->subsetName=$target_cat->title;
        }
        return $this->subsetName;
    }
    
    #Accesorice for Get Subset for any Category
    public function getSubCategoriesAttribute(){
        $this->proper_subset=Category::where('subset',$this->id)->get();
        return $this->proper_subset;
    }

    
    
    #Default Route Key Name
    public function getRouteKeyName()
    {
        return 'title';
    }

    #Relations
    public function products(){
		return $this->hasMany(Product::class);
    }
    public function filters(){
        return $this->hasMany(Filter::class);
    }
}
