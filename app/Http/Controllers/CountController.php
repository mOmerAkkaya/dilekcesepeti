<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Config;

class CountController extends Controller
{
    public static function petition()
    {
        return Document::where("doc_type", config::get('constants.doc_type')["petition"])->count();
    }

    public static function contract()
    {
        return Document::where("doc_type", config::get('constants.doc_type')["contract"])->count();
    }

    public static function judicial()
    {
        return Document::where("cat", config::get('constants.cat')["judicial"])->count();
    }

    public static function process()
    {
        return Document::all()->count();
    }
}
