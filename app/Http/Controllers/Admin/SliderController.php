<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use COM;
use Illuminate\Http\Request;

class SliderController extends AdminController
{

    public function index()
    {
        $sliders = Slider::latest()->paginate('10');
        return view('Admin.Slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('Admin.Slider.SliderAdd');
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'title'    => 'required',
            'link'     => 'required',
            'picture'  => 'required',
        ]);

        $image = $this->ImageUploade($request['picture'], 'Slider-Pictures/');
        Slider::create([
            'title' => $request['title'],
            'link' => $request['link'],
            'picture' => $image,
            'position' => $request['position'],
        ]);
        return redirect()->route('slider.index');
    }


    public function show(Slider $slider)
    {
        return redirect()->route('slider.index');
    }


    public function edit(Slider $slider)
    {
        return view('Admin.Slider.SliderEdit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $hasImage = $request['picture'];
        if ($hasImage) {
            $address = $this->StandardPath() . $slider->picture;
            if (file_exists($address)) unlink($address);
            $image = $this->ImageUploade($request['picture'], 'Slider-Pictures/');
        } else
            $image = $slider->picture;


        $slider->update([
            'title' => $request['title'],
            'link' => $request['link'],
            'picture' => $image,
        ]);

        return redirect()->route('slider.index');
    }


    public function destroy(Slider $slider)
    {
        $image = $slider->picture;
        $address = $this->StandardPath() . $image;
        $deleted = unlink($address);
        if ($deleted) {
            $slider->delete();
            return redirect()->route('slider.index');
        } else
            echo "Picture Not Found!";
    }
}
