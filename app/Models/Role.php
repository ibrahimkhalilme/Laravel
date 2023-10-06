<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // ******************* Class 85 (Many to Many Relationship) ***************
    // Allowing all at once
    // protected $guarded = [];

    // Allowing one by one manually
    protected $fillable = ['name'];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
