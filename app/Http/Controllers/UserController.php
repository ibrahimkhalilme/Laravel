<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        // return 'Getting from Controller';

        return view('greeting');
    }

    public function show($id){
        return 'From show | User ID id' .$id;
    }
}
