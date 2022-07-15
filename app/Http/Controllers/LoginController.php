<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    public function Login()
    {
        return view("auth.login", ["title" => "Login"]);
    }

    public function LoginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required', "min:6", "max:50"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("dashboard");
        }

        return back()->with("authError", "There is an Error Occur");
    }

    public function LogoutAuth(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirect()
    {
        if (Auth()->check()) {
            return redirect("/dashboard");
        } else {
            return redirect("/login");
        }
    }
}
