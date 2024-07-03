<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $title = 'Login';

        return view('auth.login', compact(
            'title'
        ));
    }

    public function action_login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $login = [
            'email' => $email,
            'password' => $password
        ];
        // dd($login);

        if (Auth::attempt($login)) {
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }

    public function register()
    {
        $title = 'Register';

        return view('auth.register', compact(
            'title'
        ));
    }

    public function action_register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $register = new User();
        $register->name = $name;
        $register->email = $email;
        $register->password = bcrypt($password);

        $register->save();
        return redirect('/')->with('success', 'User berhasil ditambah.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
