<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;




/****************
 *
 *
 * Routes
 *
 *
 * *************** */




/*

// Default Laravel Route
Route::get('/', function () {
    return view('welcome');
});

*/

/*************** Class 05 *****************

// Simple Route
Route::get('/simple', function (){
    return 'Hello World!';
});

*/


/********************* Class 06 ****************************

// ID | id is defined by numbers like 1/2/3/4/5/6....
Route::get('/id/{id}', function ($id){
    return 'User Id is' .$id;
});



// Name | ? bypass the name like: url: localhost/test/someone  | 'someone' is bypassed
Route::get('name/{name?}', function (){
    return 'Simple Name';
});

*/

/******************* Class 07 ***************************

// User Name | url will only accept a-z words. (Capital will capital, and lowercase will lowsercase, or both.)
Route::get('/user/{name}', function (string $name){
    return 'Test User Name';
}) ->where ('name', '[a-z]+');



// User ID |
Route::get('/user/{id}', function (string $id){
    return 'Test User ID' .$id;
}) ->where ('id', '[0-9]+');

*/

/******************* Class 08 ***************************

// Multiple |
Route::get('/user/{id}/{name}', function (string $id, string $name){
    return 'Multiple user ID & Name';
}) ->where (['id'=> '[0-9]+', 'name'=> '[a-z]+']);

*/


/******************* Class 09 **************************

Route::redirect('/','login');

Route::get('login', function(){
    return 'Login Page';
});

*/

/******************* Class 10 **************************

Check all Route list command.
=================================
php artisan route:list


Remove vendor (third perty routes)
======================================
php artisan route:list --except-vendor

*/

/******************* Class 11 **************************


Route::redirect('/','login');

Route::get('/login', function() {
    return '<a href="/about">Login | Go to About</a>';
});

Route::get('/about', function() {
    return '<a href="/login">About | Go to Login</a>';
});

*/



/***************************
 * Class 12
 * Resources/views
 *
 * Learning blade
 * **************************


Route::get('greeting', function(){
    return view('greeting');

});


Route::view('greeting', 'greeting');

*/

/******************* Class 13 **************************

Route::get('greeting', function(){
    $name = 'Ibrahim Khalil';

    // return view('greeting', ['name'=> $name]);
    // return view('greeting', compact('name'));
    return view('greeting')->with('name', $name);

});

/******************* Class 14 **************************

Route::get('/test', function (){
    return view('admin.profile'); // View the extrenel page. admin(folder) . or / profile
});


/******************* Class 15 **************************

// How to clear cache?

Clear view cache
==================
php artisan view:clear


Clear Route cache
=======================
php artisan route:clear

*/


/******************* Class 16 & Class 17 **************************

//View Masterblade file
Route::get('master', function(){
    return view('layouts.master');
});

//View Testblade file
Route::view('test', 'layouts.test');

//View Testblade1 file
Route::view('test1', 'layouts.test1');

/*

/******************* Class 18 **************************

Route::get('master', function(){
    return view('layouts.master');
});

// User blade
Route::view('user', 'user');
// Post blade
Route::view('post', 'post');

*/


/******************* Class 22 (Controller) **************************/

Route::get('users', [UserController::class, 'index']);

/******************* Class 23 (Parameterize route & Controller) **************************/

Route::get('users/show/{id}', [UserController::class, 'show']);

/******************* Class 24 (Resource Controller) **************************/

Route::resource('posts', PostController::class);


/******************* Class 25 (Connect Database) Class 26 (Check Database Connection) ***************************/

Route::redirect('/', 'connection');

Route::get('connection', function(){
    try{
        DB::connection()->getPdo();
        return 'Database Connected Successfully! :)';
    }
    catch(\Exception $ex){
        dd($ex->getMessage());
    }
});



/******************* Class 38 ****************************/


Route::get('insert', function(){

    Post::create([
        'title' => 'Secund one Laravel 9',
        'description' => 'Laravel is very cool',
        'is_publish' => false,
        'is_active' => false
    ]);

    return 'Inserted Successfully!';

});

/******************* Class 40 ****************************/

// Class 40
Route::get('insert_show', function(){

    // 1) $posts = Post::all();
    // 2) $posts = Post::FindOrFail(19);

    /* 3)
    $post = Post::Find(19);
    if(! $post){
        return 'Post not found!';
    }
    */

    // 4)
    // Must Title & Description are same
    // $post = Post::where('title', 'Secund one Laravel 9')->where('description', 'Laravel is very cool')->get();

    //Title or Description are same. If only 1 is same (Title / Description) then table will shows up!
    // $post = Post::where('title', 'Secund one Laravel 9')->orwhere('description', 'Laravel is very cool')->get();

    // 5)
    // $post = Post::where(['title'=> 'First one Laravel 9', 'description'=> 'Laravel is very cool'])->get();
    // return $post;
});



/******************* Class 41 ****************************

Route::get('insert_show', function(){
    // Find record
    $post = Post::where('title', 'Laravel Title Update')->first();
    if(! $post){
        return 'Post not found';
    }

    // Update
    $post->update([
        'title'=>'Laravel Title Update first',
        'description' => 'Laravel Description updated! :)'
    ]);

    return 'Updated Successfully!';
});

*/

/******************* Class 42 ****************************

Route::get('delete', function(){
    $post = Post::find(31);
    if(! $post){
        return 'Post not found!';
    }
    else{
        $post->delete();
    return 'Deleted Successfully! :)';

    }

});

*/

/******************* Class 43 *****************************

Route::get('posts', [PostController::class, 'index']);

Route::get('posts_store', [PostController::class, 'store']);

/******************* Class 44 *****************************
Route::get('posts_update', [PostController::class, 'update']);
Route::get('posts_destroy', [PostController::class, 'destroy']);

*/

/******************* Class 45 ******************************/

Route::resource('posts', PostController::class);

/******************* Class 46 ******************************/
Route::get('admin/different-url', function(){
    return 'Test 1';
})->name('different-by-name');

Route::get('test-2', function(){
    return 'Test 2';
})->name('test.2');


/******************* Class 56 ******************************
Route::get('login', function(Request $request){
    Session::put('login', 'You are Logged in :)');

    session::forget('login');
    // session::flush();

    if(Session::has('login')){
        return 'Session set successfully! :)';
    }else{
        return 'Session not set :( Please try again or later!';
    }

});

*/



/******************* Class 73 (Soft Delete) ******************************/
Route::get('posts/soft-delete/{id}', [PostController::class, 'softDeletes'])->name('posts.soft-delete');


/******************* Class 74 (Soft Deleted post Permanently Delete) ******************************/
Route::get('posts/permanently-delete/{id}', [PostController::class, 'permanentlyDelete'])->name('posts.permanently-delete');


/******************* Class 75 (Database Query Builder) ******************************/
Route::get('get/posts', [PostController::class, 'getPosts'])->name('get.posts');





/******************* Class 78 (Relationship One To One) ******************************/
Route::get('hasone', function(){

    $user = User::first();
    return $user->post;

});

/******************* Class 79 (Inverse Relationship One To One) ******************************/

Route::get('belongsto-one', function(){
    $post = Post::first();
    return $post->user;
});


/******************* Class 80 (Relationship One To Many) ******************************/
Route::get('hasmany', function(){

    $user = User::first();
    return $user->posts;
});


/******************* Class 81 (Inverse Relationship One To Many) ******************************/
Route::get('belongsto-many', function(){

    $posts = Post::first();
    return $posts->user;

});


/******************* Class 82 (Default Relationship) ******************************/
Route::get('default_relationship', function(){
    $user = User::first();

    // return $user->depost;

    // Filtering post by Title, Description, Is_publish, Is_active
    // return $user->depost->title;

    /* //If User have post then show
    if($user->depost){
        return $user->depost->title;
    }else{
        return 'Nothing have on it! :)';
    }
    */

    return $user->depost;

});



/******************* Class 83 (hasOneThrough Relationship) ******************************/
Route::get('has_one_through', function(){
    $user = User::first();

    return $user->postComment;
});


/******************* Class 84 (hasManyThrough Relationship) ******************************/
Route::get('has_many_through', function(){
    $user = User::first();

    return $user->postComments;
});


/******************* Class 86 (Many to Many Relationship) ******************************/

Route::get('many_to_many', function(){
    $user = User::first();
    $role = App\Models\Role::first();

    //********************** User to Role *************************************
    // For attach user to role
    return $user->roles()->attach($role);

    // Detach user to role
    // $user->roles()->detach($role);

    // return $user->roles;

    //********************** Role to User *************************************

    // For attach role to user
    // $role->users()->attach($user);

    // Detach role to user
    // $role->users()->detach($user);

});


/******************* Class 87 () ******************************/
Route::get('sync_many_to_many', function(){
    $user = User::first();
    $role = App\Models\Role::first();

    // Attach
    // $user->roles()->attach([1, 2, 3]);

    //Detach
    // $user->roles()->detach([1, 2]);

    //Sync
    // $user->roles()->sync($role);

    // Sync will stay selected role (2). ands other roles will removed.
    $user->roles()->sync([2]);



    return 'Done Successfully! :)';
});



/******************* Class 88 (One to One Polymorphic Relationship) ******************************/
Route::get('one_to_one_polymorphic', function(){
    $user = User::first();
    $post = Post::first();


    // User with their Image
    // return $user->image;

    // Post with their Image
    // return $post->image;


    //**** Inverse Polymorphic Relationship (Get User / Post by their Image)*/

    // Find the first Image. (First Image is User's Image)
    $image = App\Models\Image::first();


    // Find the Image. (Secund Image is Post's Image)
    // $image = App\Models\Image::find(2);

    return $image->imageable;


});



/******************* Class 90 (One to Many Polymorphic Relationship) ******************************/
Route::get('one_to_many_polymorphic', function(){
    $user = User::first();
    $post = Post::first();

    // User with their Images
    // return $user->images;

    // Post with their Images
    return $post->images;

});


/******************* Class 91 (Many to Many Polymorphic Relationship) ******************************/
Route::get('many_to_many_polymorphic', function(){
    $post = Post::first();
    $user = User::first();

    // Getting all Tags associated with first post
    return $post->tags;

    // Getting all Tags associated with first user
    // return $user->tags;


    //************** Inverse Relationship ********************/
    // Find first Tag
    $tags = App\Models\Tag::first();

    // Find Secund Tag
    // $tags = App\Models\Tag::find(2);


    // Getting all posts associated with tag
    // return $tags->posts;

    // Getting all users associated with tag
    // return $tags->users;


});
