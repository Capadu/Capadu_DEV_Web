<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page_Master;
use App\User;
use Session;

class PagesMasterController extends Controller
{
    public function index () {
        $DBuser = User::where("id", "=", Session::get("user")->id)->first();

        return view('TeacherPages.page_settings')->with('user', $DBuser);
    }

    public function edit (Request $request, $id) {

        $request->validate([
            'visible' => 'required|integer|max:1',
            'redirected' => 'required|integer|max:1',
            'redirect_url' => 'string|max:255',
            'route' => 'alpha_dash|max:255'
        ]);

        $DBuser = User::where("id", "=", Session::get("user")->id)->first();

        if (Page_Master::where("route", "=", $request->route)->first() != NULL &&
            Page_Master::where("route", "=", $request->route)->first()->id != $DBuser->pagemaster->id &&
            $request->route != NULL) {

            Session::flash("error", "Ruta exista deja!");

            return back();
        }

        $page_settings = Page_Master::where("id", "=", $id)->first();

        $page_settings->visible = $request->visible;
        $page_settings->redirected = $request->redirected;
        $page_settings->redirect_url = $request->redirect_url;
        $page_settings->route = $request->route;
        $page_settings->save();

        return redirect('page_settings');
    }
}
