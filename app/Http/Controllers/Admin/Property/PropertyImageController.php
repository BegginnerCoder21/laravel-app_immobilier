<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyImageController extends Controller
{
    public function addImages($property_id){

        $id = Property::select('id')->findOrFail($property_id);
        return view('dashboard.properties.images.create',compact('id'));
    }

    public function savePropertyImages(Request $request)
    {
        $file = $request->file('Namefiles');
        $fileName = $file->store('/','properties');
        
        return response()->json([
            'name' => $fileName,
            'original_name' => $file->getClientOriginalName()
        ]);
    }
}
