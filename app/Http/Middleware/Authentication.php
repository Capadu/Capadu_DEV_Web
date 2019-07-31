<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\User;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->session()->get('user');

        //verify that there is a user
        if ($user != NULL) {

            $DBuser = User::where("id", "=", $user->id)->get();

            //verify that the user in not deleted
            if (count($DBuser) == 1) {
                return $next($request);
            }
            else {
                Session::flush();
                return redirect('/login');
            }
        }
        else {
            return redirect('/login');
        }

    }
}
