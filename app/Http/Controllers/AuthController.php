<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authView(){
        return view('auth.authentication');       
    }

    public function login(Request $request){

    }

    public function register(Request $request){
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
