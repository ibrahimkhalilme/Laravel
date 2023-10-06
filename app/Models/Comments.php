<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;

    //*********** Class 83 ******************* */
    // Passing one by one Manually
    protected $fillable = ['post_id', 'message'];


    // Passing all thing at once
    // protected $guarded = [];

}
