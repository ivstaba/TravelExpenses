<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Post;
use App\User;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user($id);
        
        if($user){
            
            $posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'asc')->paginate(30);
            
            return view('user.profile')->withUser($user)->withPosts($posts); 
        }           
    }
}
