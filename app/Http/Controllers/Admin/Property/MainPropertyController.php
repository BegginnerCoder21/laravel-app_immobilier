<?php

namespace App\Http\Controllers\Admin\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class MainPropertyController extends Controller
{
    public function index()
    {
        $properties = Property::select('id', 'slug', 'total_price', 'create_at');

        return view('dashboard.properties.general.index',compact('properties'));
    }
}
