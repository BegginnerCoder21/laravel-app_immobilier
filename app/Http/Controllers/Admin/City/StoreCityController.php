<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatingCityRequest;

class StoreCityController extends Controller
{
    public function store(CreatingCityRequest $request)
    {
        
      
        if ($request->has('image')) {
            $imageUrl = $request->image->store('admin/cities', 'public');
            $request->merge(["photo" => $imageUrl]);
        }


        $city = City::create([
            ...$request->validated(),
            'photo' => $request->photo
        ]);

        return redirect()->route('admin.cities')->with(["success" => "La ville a bien été crée"]);
    }
}
