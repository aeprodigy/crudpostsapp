<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //|This is user's post controller
    public function createPost(Request $request){
        $incomingPostFields = $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        //strip the data before its saved into the database
        $incomingPostFields['title'] = strip_tags($incomingPostFields['title']);
        $incomingPostFields['body'] = strip_tags($incomingPostFields['body']);
        //posting user_id
        $incomingPostFields['user_id'] = auth()->id();
        Post::create($incomingPostFields);//the model post creates the post with the data as it's argument
        
        return redirect('/');

    }

    public function showEditScreen(Post $post){

        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }
        return view('edit-post',['post'=> $post]);

    }

    
    public function updatePost(Post $post, Request $request){
        //validate the incoming form fields
        $incomingPostFields = $request->validate([
            'title'=>'required',
            'body'=>'required',
        ]);

        //strip the data before its saved into the database
        $incomingPostFields['title'] = strip_tags($incomingPostFields['title']);
        $incomingPostFields['body'] = strip_tags($incomingPostFields['body']);
    
        $post->update($incomingPostFields);

        return redirect('/');
    }

    //The delete post method
    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
           $post->delete();
        }
        return redirect('/');

    }

}
