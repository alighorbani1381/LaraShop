<?php

namespace App;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'english_name';
    }

    //Jalali Date Time
    public function getJalaliDateTimeAttribute()
    {
        $time=verta($this->created_at);	
        Verta::setStringformat('Y/n/j h:m');
        return $time;
    }
}
