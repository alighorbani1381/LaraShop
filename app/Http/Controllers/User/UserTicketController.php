<?php

namespace App\Http\Controllers\User;

use App\AnswerTicket;
use App\Http\Controllers\Controller;
use App\UserTicket;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $userTickets = UserTicket::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(8);
        return view('User.Ticket.index', compact('userTickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User.Ticket.TicketAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $sendTicket=UserTicket::create([
            'user_id' => auth()->user()->id,
            'ticket_title' => $request->ticketTitle,
            'priority' => $request->priority,
            'ticket_body' => $request->ticketBody,
        ]);
        if($sendTicket){
            session()->flash('sendTicket', true);
            return redirect()->route('user.ticket.index');
        }
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserTicket  $userTicket
     * @return \Illuminate\Http\Response
     */
    public function show(UserTicket $ticket)
    {
        $answer = AnswerTicket::where('ticket_id', $ticket->id)->first();
        return view('User.Ticket.TicketShow',compact('ticket', 'answer'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserTicket  $userTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTicket $userTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserTicket  $userTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserTicket $userTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserTicket  $userTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTicket $userTicket)
    {
        //
    }
}
