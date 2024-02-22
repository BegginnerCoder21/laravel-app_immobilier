<?php

namespace App\Http\Controllers\Admin\Property;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyFeatureRequest;

class PropertyFeatureController extends Controller
{
    public function getFeature($property_id)
    {
        $property = Property::select('id')->findOrFail($property_id);
        return view('dashboard.properties.features.create', compact('property'));
    }

    public function savePropertyFeature($property_id, StorePropertyFeatureRequest $request)
    {
       
        $property = Property::findOrFail($property_id);

        $property->update($request->except('_token'));

        return redirect()->route('admin.properties.index')->with(['success' => "mise a jour effectuée"]);
    }
}
