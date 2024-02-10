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

    public function update($id, UpdateCategoryRequest $request){

        try {
            DB::beginTransaction();
            $category = Category::findOrFail($id);

            if(!$category){
                return view('admin.categories')->with(['error' => "Category non trouvé"]);
            }

            if (!$request->has('is_active')) {
                $request->merge(['is_active' => 0]);
            } else {
                $request->merge(['is_active' => 1]);
            }

            $category->update([
                ...$request->validated(),
                'is_active' => $request->is_active
            ]);

            DB::commit();

            return redirect()->route('admin.categories')->with(["succes" => "La category a été mis à jour"]);
        }catch (\Exception $error){
            DB::rollBack();
            return redirect()->route('admin.categories')->with(["error" => "Quelque chose s'est mal passé"]);
        }


    }

}
