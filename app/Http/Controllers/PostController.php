<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Auth;

class PostController extends Controller
{
    //
    public function showAllPosts(){
    	$varposts=Post::all();

    	return view('posts')->with('postview', $varposts);
 		//return view('posts')->withPostview($varposts);
 
    }
    public function createPost(){
    	return view('postsform');
    }
     public function savePost(Request $request){
    	$this->validate($request, [
    		'title' => 'required|max:60',
    		'story' => 'required|max:255',
    		]);
    
$varposts=new Post;
$varposts->user_id=Auth::user()->id;
$varposts->title=$request->input('title');
$varposts->story=$request->input('story');
$varposts->save();

return redirect()->route('post.index')->withSuccess('Post Created');
    }

public function deletePost($id){
	$varpost=Post::find($id);
	//$varpost=Post::where([['id', '=', $id]['user_id', '=', Auth::user()->id]])->first();

	 if ($varpost){
	 	$varpost->delete();
	 		return redirect()->route('post.index')->withSuccess('Post Deleted');
    }
else{
	return redirect()->route('post.index')->withSuccess('Cannot Deleted Post');
    }
}
	 }

