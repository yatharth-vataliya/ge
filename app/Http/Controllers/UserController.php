<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegisterForm(){
    	return view('auth.register');
    }

    public function registerUser(Request $request){
    	$validated = $request->validate([
    		'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
    	]);

    	$data = $request->all();

    	User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('home')->with('success','Admin lever User registered');

    }

    public function deleteUser($user_id = NULL){
    	if($user_id == NULL)
    		return back()->with('error','Please Don\'t mess with code.');

    	if(Auth::id() == $user_id){
    		return back()->with('error','You can\'t delete yourself.');
    	}

    	User::destroy([$user_id]);

    	return redirect()->route('home')->with('success','Successfully deleted admin level user');
    }
}
