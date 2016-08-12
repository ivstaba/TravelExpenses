<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\User;
use App\Post;
use Session;

class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $user = Auth::user();
        return view('post.obrazac')->withUser($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                    'polaziste' => 'required',
                    'odrediste' => 'required',
                    'km'        => 'required|numeric',
                    'naknada'   => 'required|numeric'
        ));
        
        $user = Auth::user();
        $post = new Post;

        $post->polaziste    = $request->polaziste;
        $post->odrediste    = $request->odrediste;
        $post->km           = $request->km;
        $post->naknada      = $request->naknada;
        $post->iznos        = $request->km * $request->naknada;
        $post->user_id      = $user->id;
        
        $post->save();
        
        Session::flash('success', 'Vaši putni troškovi su uspješno spremljeni.');
        
        return redirect()->back()->withUser($user);
    }

    
}
