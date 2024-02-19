<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatingCityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MainCityController extends Controller
{
    public function index()
    {

        $cities = City::orderByDesc('id')->get();

        return view('dashboard.cities.index', compact('cities'));
    }

    public function create()
    {

        return view('dashboard.cities.create');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);

        return view('dashboard.cities.edit', compact('city'));
    }

    public function delete($id)
    {
        $city = City::findOrFail($id);

        if (!$city) {
            return redirect()->route('admin.categories')->with(['error' => "ville non trouvé"]);
        }
        
        $city->delete();
        Storage::disk('public')->delete($city->photo);

        return redirect()->route('admin.cities')->with(["success" => "La ville a bien été supprimé"]);
    }
}
