<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatingCityRequest;
use App\Models\City;

class UpdateCityController extends Controller
{
    public function update($id, UpdatingCityRequest $request)
    {
        $city = City::findOrFail($id);

        if ($request->has('image')) {
            $imageUrl = $request->image->store('admin/cities', 'public');
            $request->merge(['photo' => $imageUrl]);
        }

        $city->update([
            ...$request->validated(),
            'photo' => $request->photo
        ]);

        return redirect()->route('admin.cities')->with(['success' => "La ville a bien été modifié."]);
    }
}
