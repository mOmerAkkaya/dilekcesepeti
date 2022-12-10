<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = Page::where('slug', 'index')->firstOrFail();
        $query  =   $request["query"];
        $data   =   Document::where('name','LIKE','%'.$query.'%')->orwhere('description', 'LIKE', '%' . $query . '%')->cursorPaginate(2);
        return view('pages.result', compact('data','query','page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "TÜM OLUŞTUR";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "TÜM KAYDET";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        return "DÖKÜMAN GÖSTER";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        return "DÖKÜMAN DÜZENLEME";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        return "DÖKÜMAN GÜNCELLEME OK";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        return "DÖKÜMAN SİLME";
    }

    public static function petitionList()
    {
        return Document::where("doc_type", config::get('constants.doc_type')["petition"])->join('values', 'documents.cat','values.id')->get()->groupBy("cat");
    }
    public static function contractList()
    {
        return Document::where("doc_type", config::get('constants.doc_type')["contract"])->join('values', 'documents.cat', 'values.id')->get()->groupBy("cat");
    }
}
