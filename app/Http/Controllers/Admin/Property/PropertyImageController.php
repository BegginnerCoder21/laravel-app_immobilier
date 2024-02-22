<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyImageController extends Controller
{
    public function addImages($property_id)
    {

        $id = Property::select('id')->findOrFail($property_id);
        return view('dashboard.properties.images.create', compact('id'));
    }

    public function savePropertyImages(Request $request)
    {
        $file = $request->file('Namefiles');
        $fileName = $file->store('/', 'properties');

        return response()->json([
            'name' => $fileName,
            'original_name' => $file->getClientOriginalName()
        ]);
    }

    public function savePropertyImagesDB($property_id, Request $request)
    {
        $property = Property::select('id')->findOrFail($property_id);
        foreach ($request->document as $file) {
            Image::create([
                'property_id'=> $property->id,
                'photo' => $file
            ]);
        }
        return redirect()->route('admin.properties.index')->with(['success' => "Photo ajouté avec succès."]);
    }
}
