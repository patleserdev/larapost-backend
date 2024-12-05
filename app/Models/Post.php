<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
    ];

    // un post appartient à un user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // un post peut avoir plusieurs catégories
    public function categories()
    {
        return $this->belongsToMany(Categorie::class,'posts_categories');
    }
}
