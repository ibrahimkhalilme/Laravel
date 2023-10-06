<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ******************************* Class 78 (Relationship One To One) *********************************
    public function post() : HasOne
    {
        // Methord 1 | Model linked by dynamicly And, Auto added Forign_key & Primary ID.
        return $this->hasOne(Post::class);

        // Mathord 2 | Model linked by thir path And, Manually added Forign_key & Primary ID.
        // return $this->hasOne('App\Models\Post'::class, 'user_id', 'id');
    }


    // ******************************* Class 80 (Relationship One To Many) *********************************
    /**
     * Get all of the posts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function posts(): HasMany
    {
        // Methord 1 | Model linked by dynamicly And, Auto added Forign_key & Primary ID.
        // return $this->hasMany(Post::class);

        // Mathord 2 | Model linked by thir path And, Manually added Forign_key & Primary ID.
        return $this->hasMany('App\Models\Post'::class, 'user_id', 'id');
    }


    // ******************************* Class 82 (Default Relationship) *********************************
    /**
     * Get the post associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function depost(): HasOne
    {
        return $this->hasOne(Post::class)->where('title', 'Not have on Title')->withDefault(['key' => 'Hello World!']);
    }




    // ******************************* Class 83 (hasOneThrough Relationship) *********************************
    public function postComment()
    {
        return $this->hasOneThrough(Comments::class, Post::class);
    }


    // ******************************* Class 83 (hasManyThrough Relationship) *********************************
    public function postComments()
    {
        return $this->hasManyThrough(Comments::class, Post::class);
    }


    // ******************************* Class 85 (Many to Many Relationship) *********************************
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


    // ******************************* Class 88 (One to One Polymorphic Relationship Part:1) *********************************
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }


    // ******************************* Class 90 (One to Many Polymorphic Relationship) *********************************
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
