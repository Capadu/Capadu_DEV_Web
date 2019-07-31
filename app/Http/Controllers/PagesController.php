<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function landing() {
        return view('StaticPages.landing');
    }

    public function main() {
        return view('StaticPages.main');
    }

    public function dashboard() {
        return view('TeacherPages.dashboard');
    }

}
