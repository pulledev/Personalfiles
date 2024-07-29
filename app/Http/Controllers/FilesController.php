<?php

namespace App\Http\Controllers;

use App\Models\Files;

class FilesController extends Controller
{
    public function files()
    {
        $files = Files::with("rank","unit")->get();
        return view("files", ["files" => $files]);
    }
}
