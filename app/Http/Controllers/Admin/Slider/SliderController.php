<?php

namespace App\Http\Controllers\Admin\Slider;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderImageRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {

        $images = Slider::get('photo');
        return view('dashboard.sliders.create', compact('images'));
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

    public function saveSliderImagesDB(SliderImageRequest $request)
    {

        try {
            if ($request->has('document')) {

                foreach ($request->document as $image) {

                       Slider::create([
                        'photo' => $image
                    ]);
                }
                return redirect()->back()->with(['success' => "Image ajouté au slider."]);
            }   
        } catch (\Exception $err) {

            return redirect()->back()->with(['error' => "Quelque chose s'est mal passé."]);
        }
    }
}
