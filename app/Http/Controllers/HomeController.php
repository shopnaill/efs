<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Client;
use App\Models\Service;
use App\Models\About;
use App\Models\Work;


class HomeController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slider = Slider::first();
        $clients = Client::all();
        $services = Service::all();
        $about = About::first();
        $works = Work::all();
        return view('welcome', compact('slider','clients','services','about','works'));
    }
}
