<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Hash;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

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
          $user =  User::create([
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

            if ($request->input('picture') != NULL){
                $screen = $request->input('picture');
                $filterd_data = substr($screen, strpos($screen, ",")+1);
                //Decode the string
                $unencoded_data=base64_decode($filterd_data);
                $name = time().'.png';
                $user_photo = Image::make($unencoded_data);
                $user_photo-> save(public_path().'/images/UserPhoto/' .  $name);
                $user->picture = $name;
                $user->save();
            }

            return redirect()->route('users.index')->with('success', 'User Created Successfully');
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
        $user = User::find($id);
       
        $user->update([
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'address' => $request->address,
            'birthDate' => $request->birthDate,
            'number' => $request->number,
            'email' => $request->email,
        ]);

        if ($request->input('picture') != NULL){
            $screen = $request->input('picture');
            $filterd_data = substr($screen, strpos($screen, ",")+1);
            //Decode the string
            $unencoded_data=base64_decode($filterd_data);
            $name = time().'.png';
            $user_photo = Image::make($unencoded_data);
            $user_photo-> save(public_path().'/images/UserPhoto/' .  $name);
            $user->picture = $name;
            $user->save();
        }
        return redirect()->route('users.index')->with('success', 'User Updated Successfully');;
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
