<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class Authentication extends Controller
{
    public function login(Request $request) {

        $request->validate([
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);

        $user = User::where("email", "=", $request->email)->get();

        if (count($user) != 1) {
            Session::flash("error", "Invalid acount!");

            return back();
        }

        $validuser = $user[0];

        if (password_verify($request->password, $validuser->password) != true) {
            Session::flash("error", "Invalid acount!");

            return back();
        }

        Session::put("user", $validuser);

        return redirect($role.'/dashboard');

    }

    public function logout($role) {
        Session::flush();
        return redirect('/');
    }
}
