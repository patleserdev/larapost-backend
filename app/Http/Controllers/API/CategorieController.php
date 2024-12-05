<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
              // On récupère tous les utilisateurs
    $categories = Categorie::all();


    // On retourne les informations des utilisateurs en JSON
    return response()->json($categories,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
        ]);

        // création
        $categorie = Categorie::create([
            'title' => $request->title,
            'description' => $request->description,

        ]);

        return response()->json($categorie,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return response()->json($categorie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([
            'title' => 'required|max:100',
            'description' => 'required',
        ]);

        $categorie->update([
            'title'=>$request->title,
            'description'=>$request->description, 
        ]);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        return response()->json();
    }
}
