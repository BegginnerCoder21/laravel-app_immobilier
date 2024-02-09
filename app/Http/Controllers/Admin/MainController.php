<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $categories = Category::translatedIn(app()->getLocale())
                                                ->with('_parent')
                                                ->orderByDesc('id')
                                                ->get();

        return view('dashboard.categories.index',compact('categories'));
    }

    public function create(){

        $categories = Category::translatedIn(app()->getLocale())->select('id','parent_id')->get();

        return view('dashboard.categories.create',compact('categories'));
    }
}
