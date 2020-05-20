<?php

namespace App\Http\Controllers\Admin;

use App\AnswerTicket;
use App\Http\Controllers\Controller;
use App\Question;
use App\UserTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq(){
        $ًquesionsCategories=Question::where([ ['subset', '0'], ['shared', 'enable']])->get();
        return view('Default.faq', compact('ًquesionsCategories'));
    }

    public function index()
    {
        $ًquesionsCategories=Question::where('subset', '0')->get();
        return view('Admin.Question.index', compact('ًquesionsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ًquesionsCategories=Question::where([ ['subset', '0'], ['shared', 'enable']])->get();
        return view('Admin.Question.QuestionAdd', compact('ًquesionsCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['subset'] != '0'){
            Question::create([
                'question_text' => $request['question_text'],
                'answer' => $request['answer'],
                'subset' => $request['subset'],
                'shared' => $request['status'],
            ]);
        }else{
            Question::create([
                'question_text' => $request['question_text'],
                'answer' => '...',
                'subset' => '0',
                'shared' => 'enable',
            ]);
        }
    }

    public function createTicket(Request $request){
        if(Auth::check()){
            $invalidParam=['enquiryTitle' => 'required','enquiryText' => 'required',];
            $userInfo = ['user_id' => $request->name ,'ticket_title' => $request->enquiryTitle ,'ticket_body' => $request->enquiryText ,'priority' => $request->priority ,'status' => 'wait' ,];
        }else{
            $invalidParam = ['name' => 'required','email' => 'required|email','enquiryTitle' => 'required','enquiryText' => 'required',];
            $userInfo = ['user_name' => $request->name ,'email' => $request->email ,'ticket_title' => $request->enquiryTitle ,'ticket_body' => $request->enquiryText ,'priority' => 'normal' ,'status' => 'wait' ,];
        }

        $this->validate(request(),$invalidParam);
        $userTicket=UserTicket::create($userInfo);
        if($userTicket != null){
            if($userTicket->user_id != null)
                session()->flash('sendTicket', true);
            else
                session()->flash('sendTicketEmail', true);
        }
            return redirect()->route('index');
        

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
