<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index(){

        $images = Slider::get('photo');
        return view('dashboard.sliders.create',compact('images'));
    }
}
