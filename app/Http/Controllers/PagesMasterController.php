<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page_Master;
use Session;

class PagesMasterController extends Controller
{
    public function index () {
        if (empty(Session::get("user")->pagemaster)) {
            $page_master = new Page_Master();
            $page_master->user_id = Session::get("user")->id;
            $page_master->save();
        }

        return view('TeacherPages.page_settings');
    }

    public function edit (Request $request, $id) {
        return redirect('page_master');
    }
}
