<?php
//userController imports

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//Home page
Route::get('/', function () {
    $posts=[];
    if(auth()->check()){
    //get Posts from the current user
    $posts = auth()->user()->userPosts()->latest()->get();//spans out from the intuitive of a user
    //get all posts from all users 
    //$posts =Post::all();//spans out from the intuitive of blog posts
    }
    return view('home',['posts'=>$posts]);
});

//register route
Route::post('/register', [UserController::class, 'register']);
//logout route
Route::post('/logout', [UserController::class, 'logout']);

//Login Route
Route::post('/login', [UserController::class, 'login']);

//post Route
Route::post('/create-post',[PostController::class,'createPost']);
//route to the edit post page
Route::get('/edit-post/{post}',[PostController::class,'showEditScreen']);
//update Route
Route::put('/edit-post/{post}',[PostController::class, 'updatePost']);
//the delete Request
Route::delete('/delete-post/{post}',[PostController::class, 'deletePost']);