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

            if (!$request->has('is_active')) {
                $request->merge(['is_active' => 0]);
            } else {
                $request->merge(['is_active' => 1]);
            }

            if ($request->type == CategoryType::mainCategory) {
                $request->merge(["parent_id" => null]);
            }

            Category::create([
                'name' => $request->validated('name'),
                'parent_id' => $request->parend_id,
                'is_active' => $request->validated('is_active'),
                'slug' => $request->validated('slug')
            ]);

            DB::commit();

            return redirect()->route('admin.categories')->with(["succes" => "La session a été mis à jour"]);
        } catch (\Exception $ex) {

            DB::rollBack();
            return redirect()->route('admin.categories')->with(["error" => "Quelque chose s'est mal passé"]);
        }
    }
}
