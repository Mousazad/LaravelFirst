<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

   public function showChangePassword()
   {
	   return view('auth.change-password');
   }
	
	public function storeNewPassword(Request $request)
   {
		$request->validate([
			'old_password' => 'required|string|max:255',
			'new_password' => 'required|string|max:255',
			'new_password_confirmation' => 'required|string|max:255',
		]);
		 
		$credentials = [
			'email' => Auth::user()->email,
			'password' => $request->old_password,
		];
		 
        if (!Auth::attempt($credentials)) {
            return "Incorrect Password!";
		}
		if($request->new_password != $request->new_password_confirmation)
			return "new password not match!";
		
		$new_password = Hash::make($request->new_password);
		Auth::user()->update(['password'=>$new_password]);
		return view('dashboard');
       
   }
	
}
