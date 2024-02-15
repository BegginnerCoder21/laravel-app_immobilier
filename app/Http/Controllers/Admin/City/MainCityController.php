<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatingCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class MainCityController extends Controller
{
    public function index()
    {

        $cities = City::translatedIn(app()->getLocale())->orderByDesc('id')
                                                        ->get();

        return view('dashboard.cities.index',compact('cities'));
    }

    

}
