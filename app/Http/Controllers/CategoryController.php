<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;

use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $sliders=Slider::where('position','top')->get();
        $categories=Category::where('subset',0)->get();
        $bestSelers=Product::orderBy('bestseler','Desc')->limit(6)->get();
        $specialProducts=Product::where('special',1)->limit(6)->get();
        $newProducts=Product::orderBy('created_at')->limit(6)->get();

        $thisCategory=Category::first();
        $productCategory=$category->products()->paginate(8);
        return view('Default.Category-Product',compact('sliders', 'categories', 'bestSelers','specialProducts','newProducts','category','productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
