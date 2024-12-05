<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categorie;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $posts = Post::all();


        // On retourne les informations des utilisateurs en JSON
        return response()->json($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'user' => 'required'
        ]);

        // création
        $user = User::find($request->user);

        $post = $user->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Récupérer les catégories (tags) que vous souhaitez associer à ce post
        $categories = Categorie::whereIn('id', $request->categorie)->get(); // Par exemple, avec les ID des catégories 1 et 2

        // Attacher ces catégories au post
        $post->categories()->attach($categories);

        // Log::info('This is some useful information.');

        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:150',
            'content' => 'required',
            'user' => 'required'
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $categories = Categorie::whereIn('id', $request->categorie)->get(); // Par exemple, avec les ID des catégories 1 et 2
        // Attacher ces catégories au post
        $post->categories()->attach($categories);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json();
    }
}
