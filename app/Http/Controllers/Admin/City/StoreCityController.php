<?php

namespace App\Http\Controllers\Admin\City;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreatingCityRequest;

class StoreCityController extends Controller
{
    public function store(CreatingCityRequest $request){

        $imageUrl = "";
        if($request->has('image')){
            $imageUrl = $request->file('image')->store('cities');
        }
        dd($request->validated()->except('_token','image'));
        City::create([
            ...$request->validated()->except('_token','image'),
            'photo' => $imageUrl
        ]);
    }
}
