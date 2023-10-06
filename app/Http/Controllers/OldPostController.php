<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Class 43
        $posts = Post::all();
        return $posts;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Class 43
        Post::create([
            'title' => 'Laravel Title',
            'description' => 'Laravel is very cool',
            'is_publish' => false,
            'is_active' => false
        ]);

        return 'Inserted Successfully! :)';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        // Class 44
        $post = Post::find(4);
            $post->update([
                'title' => 'Updated Laravel Title',
                'description' => 'Updated Laravel is very cool'
            ]);

        return 'Updated Successfully! :)';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // Class 44
        $post = Post::find(5);

        if(! $post){
            return 'Post not fount :(';
        }
        else{
            $post->delete();
            return 'Post deleted successfully! :)';
        }
    }
}
