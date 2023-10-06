<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Post\PostValidateRequest;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ******************************* Class 45 *******************************

        // return view('posts.create');

        // ******************************* Class 59 *******************************

        // Return all datas from database
        // return Post::all();


        // ******************************* Class 60 *******************************

        // $posts = Post::all();
        // return view('posts.index', ['posts' => $posts]);

        // ******************************* Class 61 *******************************

        // Methord 01
        // $posts = Post::paginate(10);

        // Methord 02 (Human Readable & easy to navigate)
        // $posts = Post::simplePaginate(10);

        // Methord 03 (Not Human Readable, Shows random text/numbers as a link.)
        // $posts = Post::cursorPaginate(10);

        // return view('posts.index', ['posts' =>$posts]);

        // ******************************* Class 62 (Number Pagination) *******************************
        // $posts = Post::paginate(10);

        // ******************************* Class 73 (Soft Deleted) *******************************
        // Showing all posts (with soft deleted)
        $posts = Post::withTrashed()->paginate(10);

        // Showing only Soft deleted posts
        // $posts = Post::onlyTrashed()->paginate(10);


        return view('posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ******************************* Class 58 **********************************
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostValidateRequest $request)
    {
        // ******************************* Class 49 *******************************
        // return $request->all();

         /******************************* Class 52 (Validation) *******************************
        $request->validate([
            'Title' => 'required|min:5|max:25',
            'Description' => 'required|min:5|max:500',
            'Is_publish' => 'required',
            'Is_active' => 'required'
        ]);
*/

        // ********************************** Class 55 (Create Post) **********************************

        //Methord 1 (Create all at once)
        //Post::create($request->all());

        //Methord 2 (Create Manually by one by one)
        Post::create([
            'title' => $request-> Title,
            'user_id' => 1,
            'description' => $request-> Description,
            'is_publish' => $request-> Is_publish,
            'is_active' => $request-> Is_active
        ]);

        // dd('Values are saved Successfully! :)');

        // ******************************* Class 57 **********************************
        // Flash methord will forget then page is reloaded.
        // $request->session()->flash('alert-success', 'Post Saved Successfully! :)');

        // Put methord will stay forever. we need to forget manually.
        // Session::put('alert-success', 'Done!');

        // Forget methords for put.
        // $request->session()->forget('alert-success');
        // Session::forget('alert-success');

        // If else has 2 methords
        // if($request->session()->get('alert-success')){
        // if(Session::get('alert-success')){
        //     return 'Set :)';
        // }else{
        //     return 'Not set :(';
        // }


        // ******************************* Class 58 **********************************

        $request->session()->flash('alert-success', 'Post Created Successfully! :)');

        // Redirect on URL
        // return redirect('admin/different-url');

        // Redirect on the same form by Route (Old methord for old versions.)
        // return redirect()->route('posts.create');

        // ******************************* Class 59 **********************************
        // Redirect on the same form by Route (New methord for new or old versions. (Laravel 9)
        // return to_route('posts.create');

        // ******************************* Class 69 **********************************
        return to_route('posts.index');

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
        // ******************************* Class 64 **********************************
        // return $id;
        $post = Post::find($id);
        if(! $post){
            abort(404);
        }else{
            // return view('posts.show', ['post' => $post]);
            return view('posts.show', compact('post'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ******************************* Class 66 **********************************
        $post = Post::find($id);

        if(! $post){
            abort(404);
        }else{
            return view('posts.edit', compact('post'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostValidateRequest $request, $id)
    {

        /******************************* Class 67 (Validation) *******************************
        $request->validate([
            'Title' => 'required|min:5|max:25',
            'Description' => 'required|min:5|max:500',
            'Is_publish' => 'required',
            'Is_active' => 'required'
        ]);
*/

        // ******************************* Class 67 (Find ID) **********************************
        // return  'Your Updated ID is ' .$id;
        $post = Post::find($id);
        if(! $post){
            abort(404);
        }else{

        // ******************************* Class 67 (If found then Update) **********************************

            // Methord 1 (Update all at once)
            // $post->update($request->all());

            // Methord 2 (Update Manually by one by one)
            $post->update([
                'title' => $request-> Title,
                'description' => $request-> Description,
                'is_publish' => $request-> Is_publish,
                'is_active' => $request-> Is_active
            ]);
        }


        $request->session()->flash('alert-info', 'Post Updated Successfully! :)');
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // ******************************* Class 68 (Post find) **********************************
        $post = Post::find($id);
        if(! $post){
            abort(404);
        }else{
        // ******************************* Class 68 (If found then Delete) **********************************
            $post->delete();
        }

        $request->session()->flash('alert-danger', 'Post Deleted Successfully! :(');

        return to_route('posts.index');
    }

// ******************************* Class 73 (Soft-Delete) **********************************
    public function softDeletes(Request $request, $id)
    {
        $post = Post::onlyTrashed()->find($id);
        if(! $post){
            abort(404);
        }else{
            $post->update([
                'deleted_at' => null
            ]);

            $request->session()->flash('alert-message', 'Post Resotred Successfully! :)');
            return to_route('posts.index');
        }
    }



// ******************************* Class 74 (Soft-Deleted Post Permanently Delete) **********************************

    public function permanentlyDelete(Request $request, $id)
    {
        $post = Post::onlyTrashed()->find($id);
        if(! $post){
            abort(404);
        }else{
            $post->forcedelete();

            $request->session()->flash('permanently-delete', 'Post Parmanently Deleted Successfully! :)');
            return to_route('posts.index');
        }
    }



// ******************************* Class 75 (Database Query Builder) **********************************

    public function getPosts()
    {
        // Testing....
        // return 'Running!';

        // Methord 1. | Get all posts
        // return DB::table('posts')->get();


        // Methord 2. | Specific post detecting by title
        // return DB::table('posts')->where('title', 'Hello World!')->get();



        /*Methord 3. | We can add multiple variances to filter. Like: Title / Description / etc.
        return DB::table('posts')->where([
            'title' => 'Hello World!',
            'description' => 'Hello world! Description'
        ])->get();
        */


        // Methord 4. | If first where will not found, then second orwhere will get it.
        // return DB::table('posts')->where('title', 'Nothing is there')->orwhere('title', 'Hello World!')->get();


        // Methord 5. | We can also find the post by number list.
        // return DB::table('posts')->find(2);


        // Methord 6. We can also get by 'first' tags.
        // return DB::table('posts')->first();



        // Methord 7. We can also get just 'title' / description / or more...
        // return DB::table('posts')->pluck('title')->first();


    // ******************************* Class 77 (Raw SQL Queries) *********************************

    // Getting all posts
    // return DB::select('select * from posts');

    // Getting specific post with filtering by title
    // return DB::select('select * from posts where title = ?', ['Hello World!']);

    // Adding new post on Database posts table
    return DB::select('insert into posts (id, title, description, is_publish, is_active) values(?, ?, ?, ?, ?)', [
        4, 'Laravel Raw SQL', 'Performing raw sql', 1, 2
    ]);

    }
}

