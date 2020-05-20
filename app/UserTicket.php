<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    protected $guarded=[];
    public $table='support_ticket';

    public function getDifTimeAttribute()
    {
        $time=verta($this->created_at);	
        $diff=$time->formatDifference();
        return $diff;
    }

    public function getAnswerAttribute()
    {
        $answer=AnswerTicket::where('ticket_id', $this->id)->first();
        if($answer->count() != 0)
            return $answer;
        else
            return '***';
    }
    public function getDifTimeAnswerAttribute()
    {
        $answer=AnswerTicket::where('ticket_id', $this->id)->first();
        if($answer->count() != 0){
            $answerTime=verta($answer->created_at);
            $time=verta($this->created_at);	
            $diff=$answerTime->formatDifference($time);
        }
        else
            $diff='***';

        return $diff;
    }
    public function getSubBodyAttribute()
    {
        $words=explode(' ', $this->ticket_body);
        foreach($words as $key => $word)
            if($key != 10)
                $specialText[]=$word;
            else
                break;
            

            return implode(" ", $specialText);
    }

    public function getUserInfoAttribute()
    {
        if($this->user_id != null){
            $user=User::where('id', $this->user_id)->first();
            return $user;
        }
        
    }
}
