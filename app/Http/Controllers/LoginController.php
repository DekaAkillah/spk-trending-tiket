<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function index(){
    //     return view('admin.login');
    // }
    public function auth(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // dd($request);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/view');
            
        }
        return back()->with('loginError', 'Login  Failed!');

    }

    public function logout(){
        Auth::logout();
        request()->session()->inValidate();
        request()->session()->regenerateToken();
        return redirect('/view');
    }
}
