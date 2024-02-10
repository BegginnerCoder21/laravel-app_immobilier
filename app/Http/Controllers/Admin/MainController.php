<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $categories = Category::translatedIn(app()->getLocale())
                                                                ->with('_parent')
                                                                ->orderByDesc('id')
                                                                ->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(){

        $categories = Category::translatedIn(app()->getLocale())
                                                                ->select('id','parent_id')
                                                                ->get();

        return view('dashboard.categories.create', compact('categories'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        if(!$category){
            return view('admin.categories')->with(['error' => "Category non trouvé"]);
        }

        return view('dashboard.categories.edit',compact('category'));

    }


}
