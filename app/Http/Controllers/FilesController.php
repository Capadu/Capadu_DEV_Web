<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\File_Storage;
use App\File;
use App\User;
use Session;

class FilesController extends Controller
{
    public function index () {
        $DBuser = User::where("id", "=", Session::get("user")->id)->first();
        $files_storage = $DBuser->filestorage;

        return view('TeacherPages.manage_files')->with('files_storage', $files_storage);
    }

    public function upload (Request $request) {
        $request->validate([
            'fileToUpload' => 'required',
        ]);

        $file = $request->file('fileToUpload');
        return response()->download($file);
    }
}
