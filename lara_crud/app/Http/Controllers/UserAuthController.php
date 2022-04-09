<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'username' => 'required|min:8|max:30|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:32'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $query = $user->save();
        if($query){
            return back()->with('success','You have been successfully registered');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    public function checkUser(Request $request){
        $request->validate([
            'username' => 'required|min:8|max:30',
            'password' => 'required|min:5|max:32'
        ]);

        $user = User::where('username','=',$request->username)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('LoggedUser',$user->id);
                return redirect('profile');
            }else{
                return back()->with('fail','Invalid Password');
            }
        }else{
            return back()->with('fail','Username not found');
        }
    }

    public function userProfile(){
        if(session()->has('LoggedUser')){
            $user = User::where('id','=',session()->has('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo' => $user
            ];
        }
        return view('user.profile',$data);
    }

    public function logout(Request $request){
        $request->session()->pull('LoggedUser');
        return redirect('login');
    }
}
