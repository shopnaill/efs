<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // Dsipaly the admin dashboard
    public function index()
    {
        $sliders = Slider::paginate(10);
        return view('admin.slider.index', compact('sliders'));
    }

    // Display the create form
    public function create()
    {
        return view('admin.slider.form');
    }

    // Display the  edit form
    public function edit(Slider $slider)
    {
        return view('admin.slider.form', compact('slider'));
    }

    // update or create the slider
    public function update_create(Request $request)
    {
        // check if file iamge exist
        if ($request->hasFile('image')) {
            // add photo to the request
            $request->merge(['photo' => $request->file('image')->store('sliders')]);
        }
        if ($request->has('id')) {
            $slider = Slider::find($request->id);
            $slider->update($request->all());
        } else {
            $slider = slider::create($request->all());
        }
        return redirect()->route('admin.slider.index');
    }

    // delete the slider
    public function delete(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.index');
    }

}
