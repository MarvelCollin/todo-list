<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class AuthController extends Controller
{
    public function authView(){
        return view('auth.authentication');       
    }

    public function profileView(){
        $user = Auth::user();

        return view('pages.profile', compact('user'));
    }

    public function login(Request $request){
        // declare ke var ambil dari name di blade
        $username = $request->username;
        $password = $request->password;

        // function built in nya laravel utk cek (udah auto utk hash)
        $user = Auth::attempt(['username' => $username, 'password' => $password]);

        if($user){
            // Auth::login($user);
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
        'profile_picture' => 'none-profile.jpeg'
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
    }

    public function profileUpdate(Request $request, $id){
        
        $isProfile = $request->profile_picture;
        
        if(Hash::check($request->password, Auth::user()->password) 
        && $request->newpassword && $request->confirmpassword
        && $request->newpassword === $request->confirmpassword ){
            $newpassword = Hash::make($request->confirmpassword);
        } else {
            return redirect()->back();
            // $newpassword = Auth::user()->password;
        }
        
        if($isProfile){
            // php artisan storage:link
            
            $imageName = Str::random(20) . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            
            // ada di filesystem.php itu bisa pilih local atau public
            // tapi supaya bisa diakses pake public aja 
            //              si name di blade             path       file name  path access
            $request->file('profile_picture')->storeAs('public/images/', $imageName);
        } else {
            $imageName = User::findOrFail($id)->profile_picture;
        }

        User::findOrFail($id)->update([
            'username' => $request->username,
            'profile_picture' => $imageName,
            'password' => $newpassword
        ]);

        return redirect('/');
    }

}
