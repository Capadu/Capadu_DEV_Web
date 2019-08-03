<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchPagesController extends Controller
{
    public function pages (Request $request) {
        $request->validate([
            'route' => 'required|string|max:255',
        ]);

        return redirect('http://192.168.10.190:8000/page/'.$request->route);

    }
}
