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

    public function create(){


        return view('dashboard.cities.create');
    }

    public function delete($id)
    {
        $city = City::findOfFail($id);

        if(!$city){
            return redirect()->route('admin.categories')->with(['error' => "ville non trouvé"]);
        }
        $city->delete();

        return redirect()->route('admin.cities')->with(["success" => "La ville a bien été supprimé"]);
    }

}
