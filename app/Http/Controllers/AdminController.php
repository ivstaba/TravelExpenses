<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use App\Post;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct(){
        
        $this->middleware('admin');
    }
    
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(20);
        
        return view('admin.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        return view('admin.create');
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
            'name' => 'required|max:150',
            'degree' => 'required',
            'position' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'username' => 'required|min:3|max:20|unique:users',
            'admin' => 'required',
            'password' => 'required|min:5|max:30'
        ));
        
        $user = new User;
        
        $user->name = $request->name;
        $user->degree = $request->degree;
        $user->position = $request->position;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->admin = $request->admin;
        $user->password = bcrypt($request->password);
        
        $user->save();
        
        // Session::flash('key', 'value');
        Session::flash('success', 'Korisnik je uspješno kreiran!');
        
        return redirect()->route('admin.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        if($user){
            
            $posts = Post::where('user_id', '=', $user->id)->orderBy('created_at', 'asc')->paginate(30);
            
            return view('admin.show')->withUser($user)->withPosts($posts);
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
        $user = User::find($id);
        
        return view('admin.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        if($request->input('email') === $user->email && $request->input('username') === $user->username) {
            
             $this->validate($request, array(
                    'name' => 'required|max:150',
                    'degree' => 'required',
                    'position' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'username' => 'required|min:3|max:20',
                    'admin' => 'required',
                    'password' => 'required|min:5|max:30'
            ));
            
        } else if($request->input('email') === $user->email) {
            
             $this->validate($request, array(
                    'name' => 'required|max:150',
                    'degree' => 'required',
                    'position' => 'required',
                    'email' => 'required|email',
                    'phone' => 'required',
                    'username' => 'required|unique:users|min:3|max:20',
                    'admin' => 'required',
                    'password' => 'required|min:5|max:30'
            ));
            
        } else if($request->input('username') === $user->username){
            
            $this->validate($request, array(
                    'name' => 'required|max:150',
                    'degree' => 'required',
                    'position' => 'required',
                    'email' => 'required|email|unique:users',
                    'phone' => 'required',
                    'username' => 'required|min:3|max:20',
                    'admin' => 'required',
                    'password' => 'required|min:5|max:30'
            ));
            
        } else {
              
             $this->validate($request, array(
                    'name' => 'required|max:150',
                    'degree' => 'required',
                    'position' => 'required',
                    'email' => 'required|email|unique:users',
                    'phone' => 'required',
                    'username' => 'required|unique:users|min:3|max:20',
                    'admin' => 'required',
                    'password' => 'required|min:5|max:30'
            ));
            
        }
        
        $user->name = $request->name;
        $user->degree = $request->degree;
        $user->position = $request->position;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->admin = $request->admin;
        $user->password = bcrypt($request->password);
        
        $user->update();
        
        // Session::flash('key', 'value');
        Session::flash('success', 'Korisniku su uspješno nadograđeni podaci!');
        
        return redirect()->route('admin.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        
        Session::flash('success', 'Korisnik je uspješno izbrisan.');
        
        return redirect()->route('admin.index');
        
    }
}
