<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Page;
use App\Models\Improve;
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
        $page = Page::where('slug', 'searchresult')->firstOrFail();
        $query  =   $request["query"];
        $data   =   Document::where('name','LIKE','%'.$query.'%')->orwhere('description', 'LIKE', '%' . $query . '%')->with('get_doc_type')->cursorPaginate(2);
        (count($data)==0)? $this->Improve($query):true;
        return view('pages.result', compact('data','query','page'));
    }

    public function all()
    {
        $page   =   Page::where('slug', 'alldocuments')->firstOrFail();
        $data   =   Document::with('get_doc_type')->orderby('id','desc')->cursorPaginate(2);
        $query  =   "Tüm Dökümanlar";
        return view('pages.result', compact('data', 'query', 'page'));
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
    public function show($slug = null)
    {
        $omer ="DEMEÖE";
        $data   = Document::where('slug',$slug)->with('get_doc_type')->firstOrFail();
        $steps = (json_decode($data->steps, JSON_FORCE_OBJECT));
        return $data->template;
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
    public function categories($slug=null)
    {
        return $slug;
    }
    
    public static function petitionList()
    {
        return Document::where("doc_type", "1")->get()->groupBy("sub_cat");
    }
    public static function contractList()
    {
        return Document::where("doc_type", "2")->get()->groupBy("sub_cat");
    }


    public function Improve($query = null)
    {
        return Improve::create(['query' => $query, 'ip' => request()->ip()]);
    }

}
