<?php

namespace App\Http\Controllers\API;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les roles
        $roles = Role::all();


        // On retourne les informations des roles en JSON
        return response()->json($roles, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required|max:100',

        ]);

        // création
        $role = Role::create([
            'name' => $request->name,

        ]);

        // Log::info('This is some useful information.');

        return response()->json($role, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:100',

        ]);

        $role->update([
            'name' => $request->name,

        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json();
    }

    
}
