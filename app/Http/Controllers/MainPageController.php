<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Document;
use App\Models\Comments;

class MainPageController extends Controller
{
    public function index()
    {
        $latestComments =   Comments::join('users', 'users.id', 'comments.user_id')->join('documents', 'documents.id', 'comments.document_id')->select('users.name as uname','documents.name as dname', 'comments.*')->orderBy('comments.id','desc')->limit(3)->get();
        $page           =   Page::where('slug', 'index')->firstOrFail();
        $document       =   Document::with('get_doc_type','get_sub_cat')->orderBy('id','desc')->get();
        return view("welcome", compact('page','document', 'latestComments'));
    }
}
