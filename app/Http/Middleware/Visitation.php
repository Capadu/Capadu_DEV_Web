<?php

namespace App\Http\Middleware;

use Closure;

class Visitation
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

        //verify if there is a user
        if ($user != NULL) {

            $DBuser = User::where("id", "=", $user->id)->get();

            //verify that the user in not deleted
            if (count($DBuser) == 1) {
                return redirect('/dashboard');
            }
            else {
                Session::flush();
                return $next($request);
            }
        }
        else {
            return $next($request);
        }

    }
}
