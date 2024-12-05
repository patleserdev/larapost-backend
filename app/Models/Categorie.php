<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
    ];

    // une catégorie peut avoir plusieurs posts
    public function posts()
    {
        return $this->belongsToMany(Post::class,'posts_categories');
    }
}
