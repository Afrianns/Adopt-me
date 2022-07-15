<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function Register()
    {
        return view("auth.register");
    }

    public function RegisterAdmin()
    {
        return view("auth.admin_register");
    }


    public function ValidatedRegister(Request $request)
    {

        $validData = $request->validate([
            "username" => ['required', "min:5", "max:50", "unique:users"],
            "name" => ['required', "min:5", "max:50"],
            "email" => ['required', "email:dns", "min:10", "max:50"],
            "password" => ['required', "min:6", "max:50"]
        ]);


        $validData["password"] = Hash::make($validData['password']);

        $this->create($request, $validData);


        return redirect("/login");
    }


    public function ValidatedRegisterAdmin(Request $request)
    {
        $request['is_admin'] = true;

        $validData = $request->validate([
            "name" => ['required', "min:5", "max:50"],
            "username" => ['required', "min:5", "max:50", "unique:users"],
            "email" => ['required', "email:dns", "min:10", "max:50"],
            "address" => ['required', "min:6", "max:50"],
            "contact" => ['required', "min:5", "max:20"],
            "password" => ['required', "min:6", "max:50"],
            "is_admin" => ['required']
        ]);


        $validData["password"] = Hash::make($validData['password']);

        $this->create($request, $validData);
        return redirect("/login");
    }


    public function create($request, $validData)
    {
        User::create($validData);
        $request->session()->flash('status', 'Register was Successful!');
    }
}
