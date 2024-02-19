<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Property;
use Illuminate\Http\Request;

class MainPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::select('id', 'slug', 'total_price', 'created_at')->get();

        return view('dashboard.properties.general.index', compact('properties'));
    }

    public function create()
    {
        $data = [];
        $data['cities'] = City::active()->select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
     
        return view('dashboard.properties.general.create', $data);
    }

    public function store(StorePropertyRequest $request)
    {
        
        $newProperty = Property::create([
            ...$request->validated()
        ]);

        return redirect()->route('admin.properties')->with(["success" => "La propriété a bien été crée"]);
    }
}
