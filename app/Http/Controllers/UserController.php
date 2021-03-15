<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(User::where('username', '=', $request->username)->count() > 0){
            Session::flash('message', 'Username already taken');
            return redirect()->back();
        }else{
            User::create([
                'username' => $request->username,
                'lastName' => $request->lastName,
                'firstName' => $request->firstName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'middleName' => $request->middleName,
                'address' => $request->address,
                'birthDate' => $request->birthDate,
                'number' => $request->number,
                'email' => $request->email,
            ]);
            return redirect()->route('users.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('Users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::find($id)->update([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'address' => $request->address,
            'birthDate' => $request->birthDate,
            'number' => $request->number,
            'email' => $request->email,
        ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
