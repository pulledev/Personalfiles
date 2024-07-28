<?php

namespace App\Http\Controllers;

use App\Models\Units;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $validated = $request->validate([
            "user" => "required",
            "password" => "required"
        ]);
        if (Auth::attempt(['name' => $request->user, 'password' => $request->password])) {
            return redirect()->intended();
        }
        return redirect(route("login"))->with("error","Login Failed");
    }

    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request)
    {
        $validated = $request->validate([
            "user" => "required",
            "password" => "required"
        ]);

        $user = new User();
        $user->name = $request->user;
        $user->password = Hash::make($request->password);
        if ($user->save()){
            return redirect(route("login"))->with("success", "Benutzer wurde erstellt. Und kann nun freigeschaltet werden");
        }
        return redirect(route("register"))->with("error", "Benutzer konnte nicht ersteller werden. Probiere es nochmal");

    }

}
