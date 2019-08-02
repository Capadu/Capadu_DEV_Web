<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Capadu;
use App\User_Api_Token;

class AppComunicator extends Controller
{
    public function app_validate($token)
    {
        $user = (User_Api_Token::where('connection_token', '=', $token)->first())->user;
        $status = array(
            'validity' => !(!($user)),
        );
        return $status;
    }

    public function app_recivecapadus(Request $request, $token)
    {
        $user = (User_Api_Token::where('connection_token', '=', $token)->first())->user;
        if (!$user || !$request->id) {
            return 0;
        }
        $user_capadu = new Capadu;
        $user_capadu->capadu_id = $request->id;
        $user_capadu->owned_by = $user->id;
        $user_capadu->save();
        return "DONE!";
    }

    public function app_sendcapadus($token)
    {
        $user = (User_Api_Token::where('connection_token', '=', $token)->first())->user;
        if (!$user) {
            return 0;
        }
        $capadus = [];
        $capadb = Capadu::all();
        foreach ($capadb as $capa) {
            if ($capa->owned_by == $user->id) {
                $capadus[] = [
                    'capa_id'  => $capa -> capadu_id,
                ];
            }
        }
        return $capadus;
    }
}