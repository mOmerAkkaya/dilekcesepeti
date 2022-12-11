<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload($file, $Cat)
    {
        $orj    =   substr_replace($file->getClientOriginalName(), '', -4);
        $Name = rand(0, 999) . "-" . $orj . " - " . $Cat . "-" . date("d-m-Y-h-i-s") . "." . $file->getClientOriginalExtension();
        $up = $file->move(public_path($Cat), $Name);
        return $Name = $Cat . '/' . $Name;
    }
}
