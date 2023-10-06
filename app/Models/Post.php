<?php

// Class 36

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // ***************** Class 36 *********************
    protected $table = 'posts';


    // ********************* Class 39 *********************
    // Passing one by one Manually
    //protected $fillable = ['title', 'user_id', 'description', 'is_publish', 'is_active', 'deleted_at'];

    // Passing all thing at once
    protected $guarded = [];



    //***************** Class 79 (Inverse Relationship One To One) *********************
    /*
    public function user()
    {
        // If we use laravel structure, Then don't need to add Forign_key & Primary ID.

        // Auto Get Forign_key & Primary ID.
        return $this->belongsTo(User::class);

        // Manually adding Forign_key & Primary ID.
        // return $this->belongsTo(User::class, 'user_id', 'id');
    }
    */

    // ***************** Class 81 (Inverse Relationship One To Many) *********************

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        // If we use laravel structure, Then don't need to add Forign_key & Primary ID.

        // Auto Get Forign_key & Primary ID.
        return $this->belongsTo(User::class);

        // Manually adding Forign_key & Primary ID.
        // return $this->belongsTo(User::class, 'user_id', 'id');
    }


    // ***************** Class 88 / Class 89 (One to One Polymorphic Relationship) *********************
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    // ***************** Class 90 (One to Many Polymorphic Relationship) *********************
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }



    // ***************** Class 91 (Many to Many Polymorphic Relationship) *********************
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
