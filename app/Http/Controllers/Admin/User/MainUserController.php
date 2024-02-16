<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatingUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MainUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatingUserRequest $request)
    {

        User::create($request->validated());

        return redirect()->route('admin.users')->with(['success' => "L'utilisateur a bien été crée."]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users')->with(['success' => "L'utilisateur a bien été supprimé."]);
    }
}
