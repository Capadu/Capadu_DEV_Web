<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Page_Master;

class DynamicPagesController extends Controller
{
    public function route ($prof_route) {

        $page_master = Page_Master::where("route", "=", $prof_route)->first();

        if ($page_master == NULL) {
            return view('DynamicPages.missing_page');
        }
        else {

            if ($page_master->visible == 0 || $page_master->visible == NULL) {
                return view('DynamicPages.missing_page');
            }
            if ($page_master->redirected == 1) {
                return redirect($page_master->redirect_url);
            }

            return view('DynamicPages.route_page')->with('page_master', $page_master);
        }

    }

    public function page ($prof_route, $page_route) {
        $page_master = Page_Master::where("route", "=", $prof_route)->first();


        if ($page_master == NULL) {
            return view('DynamicPages.missing_page');
        }
        else {
            if ($page_master->visible == 0 || $page_master->visible == NULL) {
                return view('DynamicPages.missing_page');
            }
            if ($page_master->redirected == 1) {
                return redirect($page_master->redirect_url);
            }

            $own_pages = $page_master->pages;

            foreach ($own_pages as $own_page) {
                if ($own_page->route == $page_route) {
                    $page = $own_page;
                    return view('DynamicPages.page')->with('page', $page);
                }
            }
        }
    }
}
