<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    // Allowing all at once
    protected $guarded = [];

    // Allowing one by one manually
    // protected $fillable = ['url', 'imageable_id', 'imageable_type'];




    /* ******************* Class 88 (One to One Polymorphic Relationship Part:1) ***************
    public function imageable()
    {
        return $this->morphTo();
    }

    */



    // ******************* Class 90 (One to Many Polymorphic Relationship) ***************
    public function imageable() {
        return $this->morphTo();
    }


}
