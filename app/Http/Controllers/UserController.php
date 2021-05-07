<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
use Hash;
use Auth;
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
        Session::put('masterAdminSide', 'User');
        Session::put('usermanagement', 'userAccount');

        $users = User::where('accountType','!=','Customer')->where('isVerified','1')->get();

        return view('AdminPage.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $path = storage_path() . "/json/phProvinces.json";
        $provinces = json_decode(file_get_contents($path), true);
        $citiesPath = storage_path() . "/json/phCities.json";
        $citiesJson = json_decode(file_get_contents($citiesPath), true);
        $cities = array();
        foreach ($citiesJson as $index){
            array_push($cities,$index['city']);
        }
        sort($cities);
        return view('AdminPage.Users.create',compact('provinces','cities'));
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
                'accountType' => $request->accountType,
                'gender' => $request->gender,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'middleName' => $request->middleName,
                'address' => $request->address,
                'province' => $request->province,
                'city' => $request->city,
                'unit' => $request->unit,
                'buildingName' => $request->buildingName,
                'bldgNumber' => $request->bldgNumber,
                'street' => $request->street,
                'district' => $request->district,
                'month' => $request->month,
                'day' => $request->day,
                'year' => $request->year,
                'number' => $request->number,
                'email' => $request->email,
                'isVerified' => '1',
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
        
        $path = storage_path() . "/json/phProvinces.json";
        $provinces = json_decode(file_get_contents($path), true);
        $citiesPath = storage_path() . "/json/phCities.json";
        $citiesJson = json_decode(file_get_contents($citiesPath), true);
        $cities = array();
        foreach ($citiesJson as $index){
            array_push($cities,$index['city']);
        }
        sort($cities);
        return view('AdminPage.Users.edit', compact('user','provinces','cities'));
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
            'accountType' => $request->accountType,
            'gender' => $request->gender,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'middleName' => $request->middleName,
            'address' => $request->address,
            'province' => $request->province,
            'city' => $request->city,
            'unit' => $request->unit,
            'buildingName' => $request->buildingName,
            'bldgNumber' => $request->bldgNumber,
            'street' => $request->street,
            'district' => $request->district,
            'month' => $request->month,
            'day' => $request->day,
            'year' => $request->year,
            'number' => $request->number,
            'email' => $request->email,
            'isVerified' => '1',
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

        Session::put('accountType', $request->accountType);
        Session::put('loginFirstName', $request->firstName);
        Session::put('loginLastName', $request->lastName);


        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
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


    public function verifiedCustomerAccount()
    {
        Session::put('usermanagement', 'verifiedCustomerAccount');

        $users = User::where('accountType','Customer')->where('isVerified','1')->get();

        return view('AdminPage.Users.Customer.verifiedCustomerIndex', compact('users'));
    }

    public function newCustomerAccount()
    {
        Session::put('usermanagement', 'newCustomerAccount');

        $users = User::where('accountType','Customer')->where('isVerified','0')->get();

        return view('AdminPage.Users.Customer.newCustomerAccount', compact('users'));
    }

    public function verifyCustomerPost(Request $request)
    {

       User::find($request->id)->update([
           'isVerified' => '1',
       ]);

        return redirect()->route('verifiedCustomerAccount')->with('success', 'Account Verified Successfully');
    }


    
}
