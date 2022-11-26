<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class CountController extends Controller
{
    public static function page(){
        return Page::all()->count();
    }    
}
