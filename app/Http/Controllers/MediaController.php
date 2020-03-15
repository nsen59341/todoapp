<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function upload()
    {
        $file = request()->file('file');

        $name = $file->getClientOriginalName();

        $file->move('images', $name);
        
    }
}
