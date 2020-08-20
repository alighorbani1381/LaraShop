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

    public function faq()
    {
        $ًquesionsCategories = Question::where([['subset', '0'], ['shared', 'enable']])->get();
        return view('Default.faq', compact('ًquesionsCategories'));
    }

    public function index()
    {
        $ًquesionsCategories = Question::where('subset', '0')->get();
        return view('Admin.Question.index', compact('ًquesionsCategories'));
    }

    public function create()
    {
        $ًquesionsCategories = Question::where([['subset', '0'], ['shared', 'enable']])->get();
        return view('Admin.Question.QuestionAdd', compact('ًquesionsCategories'));
    }


    public function store(Request $request)
    {
        if ($request['subset'] != '0') {
            Question::create([
                'question_text' => $request['question_text'],
                'answer' => $request['answer'],
                'subset' => $request['subset'],
                'shared' => $request['status'],
            ]);
        } else {
            Question::create([
                'question_text' => $request['question_text'],
                'answer' => '...',
                'subset' => '0',
                'shared' => 'enable',
            ]);
        }
    }

    public function createTicket(Request $request)
    {
        if (Auth::check()) {
            $invalidParam = ['enquiryTitle' => 'required', 'enquiryText' => 'required',];
            $userInfo = ['user_id' => $request->name, 'ticket_title' => $request->enquiryTitle, 'ticket_body' => $request->enquiryText, 'priority' => $request->priority, 'status' => 'wait',];
        } else {
            $invalidParam = ['name' => 'required', 'email' => 'required|email', 'enquiryTitle' => 'required', 'enquiryText' => 'required',];
            $userInfo = ['user_name' => $request->name, 'email' => $request->email, 'ticket_title' => $request->enquiryTitle, 'ticket_body' => $request->enquiryText, 'priority' => 'normal', 'status' => 'wait',];
        }

        $this->validate(request(), $invalidParam);
        $userTicket = UserTicket::create($userInfo);
        if ($userTicket != null) {
            if ($userTicket->user_id != null)
                session()->flash('sendTicket', true);
            else
                session()->flash('sendTicketEmail', true);
        }
        return redirect()->route('index');
    }

    public function show(Question $question)
    {
        //
    }


    public function edit(Question $question)
    {
        //
    }


    public function update(Request $request, Question $question)
    {
        //
    }


    public function destroy(Question $question)
    {
        //
    }
}
