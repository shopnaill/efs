<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    // get all about
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    // update about
    public function update(Request $request, About $about = null)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
         ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image = $image->store('about');
            $request->merge(['photo' => $image]);
        } else {
            $image_name = $about->image;
        }

        if ($about) {
            $about->update($request->all());
        } else {
            About::create($request->all());
        }

        return redirect()->route('admin.about.index');
    }
    
}
