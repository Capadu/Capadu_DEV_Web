<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\User;
use Session;

class PagesManagerController extends Controller
{
    public function index () {
        $DBuser = User::where("id", "=", Session::get("user")->id)->first();
        $pages = $DBuser->pagemaster->pages;

        return view('TeacherPages.manage_pages')->with('pages', $pages);
    }

    public function create () {
        return view('TeacherPages.create_page');
    }

    public function add (Request $request) {

        $request->validate([
            'route' => 'required|alpha_dash|max:255',
            'title' => 'required|string|max:255',
            'content_data' => 'required|string'
        ]);

        $DBuser = User::where("id", "=", Session::get("user")->id)->first();
        $own_pages = $DBuser->pagemaster->pages;

        foreach ($own_pages as $own_page) {

            if ($own_page->route == $request->route) {
                Session::flash("error", "Ruta exista deja!");

                return back();
            }

        }

        $page = new Page();
        $page->route = $request->route;
        $page->title = $request->title;
        $page->content = $request->content_data;
        $page->page_master_id = $DBuser->pagemaster->id;
        $page->save();

        return redirect('../page_manager');

    }

    public function read ($id) {
        $page = Page::where("id", "=", $id)->first();

        return view('TeacherPages.edit_page')->with('page', $page);
    }

    public function edit (Request $request, $id) {
        $request->validate([
            'route' => 'required|alpha_dash|max:255',
            'title' => 'required|string|max:255',
            'content_data' => 'required|string'
        ]);

        $DBuser = User::where("id", "=", Session::get("user")->id)->first();
        $own_pages = $DBuser->pagemaster->pages;

        $page = Page::where("id", "=", $id)->first();

        if ($page->route != $request->route) {
            foreach ($own_pages as $own_page) {

                if ($own_page->route == $request->route) {
                    Session::flash("error", "Ruta exista deja!");

                    return back();
                }

            }
        }

        $page->route = $request->route;
        $page->title = $request->title;
        $page->content = $request->content_data;
        $page->page_master_id = $DBuser->pagemaster->id;
        $page->save();

        return redirect('../page_manager');

    }

    public function delete ($id) {
        Page::where("id", "=", $id)->delete();

        return redirect('../page_manager');
    }
}
