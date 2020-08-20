<?php

namespace App\Http\Controllers;

use App\Product;
use App\Slider;

class IndexController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('position', 'top')->get();
        $bestSelers = Product::orderBy('bestseler', 'Desc')->limit(6)->get();
        $specialProducts = Product::where('special', 1)->limit(6)->get();
        $newProducts = Product::orderBy('created_at')->limit(6)->get();
        return view('welcome', compact('sliders', 'categories', 'bestSelers', 'specialProducts', 'newProducts'));
    }

    public function contactUs()
    {
        $sliders = Slider::where('position', 'right')->get();
        return view('Default.MenuPage.ContactUs', compact('sliders'));
    }
}
