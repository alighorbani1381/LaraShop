<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];


    public function getSubQuestionAttribute()
    {
        if ($this->subset == '0')
            $subsets = Question::where('subset', $this->id)->get();
        else
            $subsets = null;

        return $subsets;
    }
}
