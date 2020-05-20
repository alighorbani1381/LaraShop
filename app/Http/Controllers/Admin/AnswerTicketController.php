<?php

namespace App\Http\Controllers\Admin;

use App\AnswerTicket;
use App\Http\Controllers\Controller;
use App\UserTicket;
use Illuminate\Http\Request;

class AnswerTicketController extends Controller
{
    /* Ticket About Gust  */

    public function index(){
        $answeredTickets=UserTicket::where('status', 'answered')->orderBy('user_id')->paginate(15);
        return view('Admin.Ticket.AnswerdTicket', compact('answeredTickets'));
    }

    public function gustTickets(){
        $gustTickets=UserTicket::where([ ['user_id', null], ['status', 'wait'] ])->paginate(15);
        return view('Admin.Ticket.GustTicket.index', compact('gustTickets'));
    }

    public function showGust(UserTicket $ticket){
        return view('Admin.Ticket.GustTicket.GustTicketShow', compact('ticket'));
    }

    public function TicketAnswer(Request $request){
        $userTicket=UserTicket::find($request->user_ticket_id);
        if($userTicket != null){
            $answer=AnswerTicket::create(['support_id' => auth()->user()->id, 'ticket_id' => $userTicket->id, 'answer_text' => $request->answer_ticket]);
            $userTicket->update(['ticket_body' => $request->user_ticket_text, 'status' => 'answered']);
    
                if($userTicket->user_id == null)
                    //Send Email
                    return redirect()->route('ticket.gust.index');
                else
                    return redirect()->route('ticket.user.index');
        }
        else{
            session()->flash('gustFail',true);
            return back();
        }
        
    }

    public function destroyGust(){

    }

    /**
     *Ticket From WebSite User
     *
     */

    public function userTickets(){
        $userTickets=UserTicket::where([ ['user_id', '!=', null], ['status', 'wait'] ])->paginate(15);
        return view('Admin.Ticket.UserTicket.index', compact('userTickets'));
    }

    public function showUser(UserTicket $ticket){
        return view('Admin.Ticket.UserTicket.UserTicketShow', compact('ticket'));
    }

  
  

    
}
