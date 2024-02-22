<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function authView(){
    //     return view('auth.authentication');       
    // }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        if(Auth::attempt(['username' => $username, 'password' => $password])){
            return redirect('/');
        }

        return redirect()->back();
    }

    public function register(Request $request){
        // validate
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 'ColumnTableName' => request->namaYangAdaDiBlade(name="")
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'bio' => 'this person rather lazy to edit bio',
            'profile_picture' => 'none-profile.png'
        ]);

        Auth::login($user);

        return redirect('/');
    }


    public function logout(){

        Auth::logout();
        return redirect('/');
    }
}
