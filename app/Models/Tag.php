<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // ******************* Class 91 (Many to Many Polymorphic Relationship) ***************

    // Inverse Relationship. Getting all posts that are assigned tags.
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    // Inverse Relationship. Getting all users that are assigned tags.
    public function users()
    {
        return $this->morphedByMany(User::class, 'taggable');
    }

}
