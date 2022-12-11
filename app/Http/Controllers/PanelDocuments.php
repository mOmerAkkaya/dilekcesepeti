<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelDocuments extends Controller
{
    public function index(){
        return view ("panel.documents.index");
    }
}
