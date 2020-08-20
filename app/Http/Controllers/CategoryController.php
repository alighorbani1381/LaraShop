<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;

use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show(Category $category)
    {
        $sliders = Slider::where('position', 'top')->get();
        $categories = Category::where('subset', 0)->get();
        $bestSelers = Product::orderBy('bestseler', 'Desc')->limit(6)->get();
        $specialProducts = Product::where('special', 1)->limit(6)->get();
        $newProducts = Product::orderBy('created_at')->limit(6)->get();

        $thisCategory = Category::first();
        $productCategory = $category->products()->paginate(8);
        return view('Default.Category-Product', compact('sliders', 'categories', 'bestSelers', 'specialProducts', 'newProducts', 'category', 'productCategory'));
    }

   
    public function edit(Category $category)
    {
        //
    }

   
    public function update(Request $request, Category $category)
    {
        //
    }

   
    public function destroy(Category $category)
    {
        //
    }
}
