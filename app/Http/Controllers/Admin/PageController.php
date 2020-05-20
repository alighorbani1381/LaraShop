<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Http\Request;

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
        $this->validate(request(),[
            'title' => 'required',
            'description' => 'required',
            'english_name' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('Admin.Page.PageEdit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->validate(request(),[
            'title' => 'required',
            'description' => 'required',
            'english_name' => 'required',
            'body' => 'required',
            'status' => 'required',
        ]);

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('page.index');
    }
}
