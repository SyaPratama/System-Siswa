<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class Authentication extends Controller
{
    public function register(): View
    {
        return view("components.auth.register");
    }

    public function regist_handler(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'email' => 'required|email:rfs|unique:users,email',
            'name' => 'required|min:5',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:5',
            'password_confirmation' => 'required|min:5'
        ]);

        if($validated->fails()) return redirect()->back()->withErrors($validated)->withInput();

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'usertype' => "admin"
        ]);

        return Redirect::to('/')->with('success','Berhasil Membuat Akun Silahkan Login');
    }

    public function login(): View
    {
        return view("components.auth.login");
    }

    public function login_handler(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'email' => "required|exists:users,email",
            'password' => "required|min:5",
        ]);

        if($validated->fails()) return redirect()->back()->withErrors($validated)->withInput();

        if(Auth::attempt($request->only('email','password'))){
            $request->session()->regenerate();
            if(Auth::user()->usertype == 'admin') return Redirect::to('/dashboard')->with('success','You successfully login');
        }

        return redirect()->back()->with("failed","Password Not Match")->withInput();
    }
}
