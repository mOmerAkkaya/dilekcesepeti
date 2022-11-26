<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class MainPageController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'index')->firstOrFail();
        return view("welcome", compact('page'));
    }
}
