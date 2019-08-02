<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;

use App\File_Storage;
use App\File;
use App\User;
use Session;
use Validator;

class FilesController extends Controller
{
    public function index () {
        $DBuser = User::where("id", "=", Session::get("user")->id)->first();
        $files_storage = $DBuser->filestorage;

        return view('TeacherPages.manage_files')->with('files_storage', $files_storage);
    }

    public function upload (Request $request) {
        $DBuser = User::where("id", "=", Session::get("user")->id)->first();

        $validator = Validator::make($request->all(), [
            'fileToUpload' => 'required',
        ]);

        if ($validator->fails()) {
            Session::put("file_system_messege", "Invalid File");
            return back();
        }

        $file = $request->file('fileToUpload');
        $OriginalfileName = $file->getClientOriginalName();
        $RoutefileName = time();
        $fileContent = $file->get();

        $encryptedContent = encrypt($fileContent);
        
        Storage::put($RoutefileName.'.dat', $encryptedContent);

        $file_record = new File();
        $file_record->file_name = $OriginalfileName;
        $file_record->route = $RoutefileName;
        $file_record->file_size = ($file->getSize())/1000000;
        $file_record->files_storage_id = $DBuser->filestorage->id;
        $file_record->save();

        Session::put("file_system_messege", "File Upload Succesful");

        return;
    }

    public function download (Request $request, $route) {
        $file = File::where("route", "=", $route)->first();

        $encryptedContent = Storage::get($route.'.dat');
        $decryptedContent = decrypt($encryptedContent);

        $aux_name = time().'_'.$file->file_name;
        Storage::put($aux_name, $decryptedContent);

        $file_path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
        $file_path = $file_path.$aux_name;

        return response()->download($file_path)->deleteFileAfterSend(true);
    }

    public function delete (Request $request, $route) {
        $file = File::where("route", "=", $route)->first();
        Storage::delete($file->route.'.dat');
        $file->delete();
    }
}
