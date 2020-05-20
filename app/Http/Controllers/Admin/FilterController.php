<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Filter;
use Illuminate\Http\Request;

class FilterController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('Admin.Filter.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::where('subset','0')->get();
        $filters=Filter::where('parent_id',0)->get();
       
        if($categories->count() != 0){
            $subFilters=$categories[0]->filters()->where('parent_id', '!=', '0')->get();
            return view('Admin.Filter.FilterAdd', compact('categories', 'filters', 'subFilters'));
        }
        else
            return 'هنوز دسته بندی وجود ندارد';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_id=$request->get('category_id');
        $persian_names=$request->get('persian_name');
        $english_names=$request->get('english_name');
        $types=$request->get('type');

        if($category_id)
            if(is_array($persian_names) && is_array($english_names)){
            foreach($persian_names as $key => $persian_name){
                $english_name=array_key_exists($key, $english_names) ? $english_names[$key] : null;

                if($types != null)
                    $type = array_key_exists($key, $types) ? $types[$key] : '0';
                else
                    $type = '0';

                    if($persian_name!=null && $english_name!=null && $type!=null){
                    Filter::create([
                        'category_id'=> $category_id,
                        'persian_name'=> $persian_name,
                        'english_name'=> $english_name,
                        'type'=> $type,
                        'parent_id'=> $request->get('parent_id'),
                    ]);
                }
            }
        }
        return redirect()->route('filter.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function show(Filter $filter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function edit(Filter $filter)
    {
        $categories=Category::where('subset','0')->get();
        $otherFilters=Filter::where([
            ['category_id','!=',$filter->id],
            ['parent_id',0],
        ])->get();
        return view('Admin.Filter.FilterEdit', compact('categories', 'otherFilters', 'filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Filter $filter)
    {
        $filter->update($request->all());
        return redirect()->route('filter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Filter  $filter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filter $filter)
    {
        if($filter->parent_id != 0)
            $filter->delete();  
        else{
            $subFiltersId=Filter::where('parent_id',$filter->id)->get('id')->toArray();
            Filter::destroy($subFiltersId);
            $filter->delete();
        }
        return back();             
    }

    public function getFilters(Request $request){
        $categoryId=$request->input('cat_id');
        $category=Category::findOrFail($categoryId);
        $filters=Filter::where('category_id', $category->id)->where('parent_id', '0')->get();
        if($filters->count() != 0)
            return response()->json(['hasFilter' => 'Yes', 'filters' => $filters]);
        else
            return response()->json(['hasFilter' => 'No']);
    }
}
