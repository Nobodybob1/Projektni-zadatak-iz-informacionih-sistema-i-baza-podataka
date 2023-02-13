<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(auth()->user()->is_admin){
            $users = User::all();
            return view('admin_users', compact('users'));
        }else{
            return back()->with('message', "You don't have privilages to do that!");
        }
        
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
        
        if(auth()->user()->is_admin){
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'username' => ['required'],
                'password' => ['required'],
                
    
            ]);
    
    
            $formFields['password'] = bcrypt($formFields['password']);
    
            $user = User::create($formFields);
    
            return redirect('/admin/index')->with('message', 'User created successfully!');
        }else{
            return back()->with('message', "You don't have privilages to do that!");
        }
        

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

        if(auth()->user()->is_admin){
            $user = User::whereId($id)->get();
            $user = $user[0];
            return view('admin_update_user', compact('user'));
        }else{
            return back()->with('message', "You don't have privilages to do that!");
        }
        
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
        if(auth()->user()->is_admin){
            $data = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'is_admin' => 'required',
            ]);
    
            User::whereId($id)->get()->first()->update($data);
            return redirect('staff')->with('message', 'User updated successfully!');
        }else{
            return back()->with('message', "You don't have privilages to do that!");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        if(auth()->user()->is_admin){
            User::whereId($request->delete)->delete();

            return back()->with('message', 'User deleted successfully!');
        }else{
            return back()->with('message', "You don't have privilages to do that!");
        }
        
    }

    public function login(Request $request, User $user)
    {

        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'

        ]);
        
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/admin/index')->with('message', 'You are now logged in!');
        }
        
        return back()->with('message', 'Username or password not correct!');

    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logged out successfully!');
    }

}
