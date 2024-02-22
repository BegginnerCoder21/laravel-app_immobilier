<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePricePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyPriceController extends Controller
{
    public function getPrice($property_id)
    {
        $property = Property::select('id')->findOrFail($property_id);
        return view('dashboard.properties.prices.create', compact('property'));
    }

    public function savePropertyPrice($property_id, StorePricePropertyRequest $request)
    {
        
        $property = Property::findOrFail($property_id);

        $property->update($request->validated());

        return redirect()->route('admin.properties.index')->with(['success' => "mise a jour effectuée"]);
    }
}
