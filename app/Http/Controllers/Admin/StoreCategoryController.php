<?php

namespace App\Http\Controllers\Admin;

use App\Http\CategoryType;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreCategoryController extends Controller
{

    public function store(StoreCategoryRequest $request)
    {


        try {
            DB::beginTransaction();

           

            if ($request->type == CategoryType::mainCategory) {
                $request->merge(["parent_id" => null]);
            }


            Category::create([
                ...$request->validated(),
                'is_active' => $request->is_active,
                'parent_id' => $request->parent_id
            ]);

            DB::commit();

            return redirect()->route('admin.categories')->with(["success" => "La category a bien été crée"]);
        } catch (\Exception $ex) {

            DB::rollBack();

            return redirect()->route('admin.categories')->with(["error" => "Quelque chose s'est mal passé"]);
        }
    }
}
