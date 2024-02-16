<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainCategoryController extends Controller
{
    public function index(){
        $categories = Category::translatedIn(app()->getLocale())
                                                                ->with('_parent')
                                                                ->orderByDesc('id')
                                                                ->get();

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(){

        $categories = Category::translatedIn(app()->getLocale())->select('id','parent_id')
                                                                ->get();

        return view('dashboard.categories.create', compact('categories'));
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        if(!$category){
            return redirect()->route('admin.categories')->with(['error' => "Category non trouvé"]);
        }

        return view('dashboard.categories.edit',compact('category'));

    }

    public function delete($id){
        try {

            $category = Category::findOrFail($id);

            if(!$category){
                return redirect()->route('admin.categories')->with(['error' => "Category non trouvé"]);
            }

            $category->delete();

            return redirect()->route('admin.categories')->with(['success' => "Category supprimé avec succès."]);
        }catch (\Exception $error){
            DB::rollBack();
            return redirect()->route('admin.categories')->with(['error' => "Quelque chose s'est mal passé"]);
        }

    }
}
