<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response;

use App\User;
use Session;
use Validator;

class Authentication extends Controller
{
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|string|max:255|min:6'
        ]);

        if ($validator->fails()) {
            return Response::json(['errors' => $validator->errors()]);
        }

        $user = User::where("email", "=", $request->email)->get();

        if (count($user) != 1) {

            $invalid_error = (object) [
                'error' => ["Cont invalid"]
            ];

            return Response::json(['errors' => $invalid_error]);
        }

        $validuser = $user[0];

        if (password_verify($request->password, $validuser->password) != true) {

            $invalid_error = (object) [
                'error' => ["Cont invalid"]
            ];

            return Response::json(['errors' => $invalid_error]);
        }

        Session::put("user", $validuser);

        return Response::json(['success' => '1']);

    }

    public function logout($role) {
        Session::flush();
        return redirect('/');
    }
}
