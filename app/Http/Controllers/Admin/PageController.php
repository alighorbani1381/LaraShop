<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

class PageRequest extends Request{

    public static function update($request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'english_name' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);
    }

    public function store($request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'english_name' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);
    }
}

class PageController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId=auth()->user()->id;
        if(isset($request->search)){
            $accesPages=Page::where('type', 'page')->where('author', $userId)->orderBy('created_at', 'desc');
            $pages=$this->searchCondition($accesPages,'title', $request->all(), 10);        
        }else
            $pages=Page::where('type', 'page')->where('author', $userId)->orderBy('created_at', 'desc')->paginate(10);
        
        return view('Admin.Page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Page.PageAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        PageRequest::store();
        $page=Page::create([
            'author' => auth()->user()->id,
            'title'  => $request['title'],
            'description'  => $request['description'],
            'english_name'  => $request['english_name'],
            'body'   => $request['body'],
            'type'   => 'page',
            'position'   => 'Nothing',
            'shared' => $request['status'],
            'view' => '0',
        ]);

        if($page)
            return redirect()->route('page.index');
        else
            return 'مشکلی پیش آمده است';
    }

    public function show(Page $page)
    {
        //
    }

   
    public function edit(Page $page)
    {
        return view('Admin.Page.PageEdit', compact('page'));
    }

  
    public function update(Request $request, Page $page)
    {
       PageRequest::update($request);

        $updated=$page->update([
            'author' => auth()->user()->id,
            'title'  => $request['title'],
            'description'  => $request['description'],
            'english_name'  => $request['english_name'],
            'body'   => $request['body'],
            'position'   => 'Nothing',
            'shared' => $request['status'],
        ]);

        if($updated)
            return redirect()->route('page.index');
        else
            return 'در بروز رسانی این برگه مشکلی پیش آمده است';
    }

    
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index');
    }
}
