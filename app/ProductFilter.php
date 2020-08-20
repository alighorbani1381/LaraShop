<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Filter;

class ProductFilter extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public $subFilter;

    #Accessoriz

    public function getFilterAttribute()
    {
        $filter = Filter::where('id', $this->filter_id)->first();
        return $filter;
    }

    public function getSubFilterAttribute($key)
    {
        $this->subFilter = Filter::where('parent_id', $this->id);
        return $this->subFilter;
    }
}
