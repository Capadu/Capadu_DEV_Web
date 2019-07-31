<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

class Registration extends Controller
{
    public function register(Request $request) {

        $request->validate([
            'nume' => 'required|string|max:255',
            'unitate_de_invatamant' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'password_confirm' => 'required|string|max:255'
        ]);

        if (count(User::where("email", "=", $request->email)->get()) != 0) {
            Session::flash("error", "Email-ul deja exista");

            return back();
        }
        if ($request->password != $request->password_confirm) {
            Session::flash("error", "Parolele sunt diferte");

            return back();
        }

        $user = new User;
        $user->nume = $request->nume;
        $user->unitate_de_invatamant = $request->unitate_de_invatamant;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Session::put("user", $user);

        return redirect('/dashboard');

    }
}
