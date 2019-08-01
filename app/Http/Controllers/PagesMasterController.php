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
        if (empty($DBuser->pagemaster)) {
            $page_master = new Page_Master();
            $page_master->user_id = Session::get("user")->id;
            $page_master->save();
        }
        $DBuser = User::where("id", "=", Session::get("user")->id)->first();

        return view('TeacherPages.page_settings')->with('user', $DBuser);
    }

    public function edit (Request $request, $id) {

        $request->validate([
            'visible' => 'required|integer|max:1',
            'redirected' => 'required|integer|max:1',
            'redirect_url' => 'string|max:255',
            'route' => 'string|max:255'
        ]);

        if (count(Page_Master::where("route", "=", $request->route)->get()) != 0) {
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
