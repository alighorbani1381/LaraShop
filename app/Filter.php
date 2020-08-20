<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    protected $fillable = [
        'category_id', 'persian_name', 'english_name', 'parent_id', 'type'
    ];

    public $timestamps = false;

    #Relations
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    #Accessorise
    public function getSubFiltersAttribute()
    {
        $subFilter = Filter::where('parent_id', $this->id)->get();
        return $subFilter;
    }
}
