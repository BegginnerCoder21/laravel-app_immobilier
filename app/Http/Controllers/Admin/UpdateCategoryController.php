<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;

class UpdateCategoryController extends Controller
{
    public function update($id, UpdateCategoryRequest $request){

        try {
            DB::beginTransaction();
            $category = Category::findOrFail($id);

            if(!$category){
                return view('admin.categories')->with(['error' => "Category non trouvé"]);
            }

            $category->update([
                ...$request->validated(),
                'is_active' => $request->is_active
            ]);

            DB::commit();

            return redirect()->route('admin.categories')->with(["success" => "La category a été mis à jour"]);
        }catch (\Exception $error){
            DB::rollBack();
            return redirect()->route('admin.categories')->with(["error" => "Quelque chose s'est mal passé"]);
        }


    }
}
