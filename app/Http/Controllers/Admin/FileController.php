<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function file()
    {
        return view('admin\file');
    }
    public function dofile(Request $request)
    {
        //dd(storage_path('app\public'));
        //dd($_FILES);
        $path = $request->file('file')->store('goods');
        //dd($path);
        echo asset('storage').'/'.$path;
    }
}
