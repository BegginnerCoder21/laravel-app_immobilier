<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderImageRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index(){

        $images = Slider::get('photo');
        return view('dashboard.sliders.create',compact('images'));
    }

    public function saveSliderImages(Request $request)
    {
        $file = $request->file('Namefiles');
        $filename = $file->store('/', 'sliders');

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName()
        ]);
    }
}
