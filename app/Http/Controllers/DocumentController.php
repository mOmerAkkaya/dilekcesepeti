<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Page;
use App\Models\Improve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrdersController;

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
        if (count($data)==0){
            $this->Improve($query);
            $notification = new NotificationController();
            $notification->store('Improve',$query);
        }
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
    public function show($slug = null, Request $request)
    {
        $page   =   Page::where('slug', 'show')->firstOrFail();
        $data   =   Document::where('slug', $slug)->with('get_doc_type')->firstOrFail();
        return view('pages.show', compact('data','page'));
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
    public function update(Request $request)
    {


        $page   =   Page::where('slug', 'show')->firstOrFail();
        $data   = Document::where('slug', $request->slug)->with('get_doc_type')->firstOrFail();
        $steps  = json_decode($data->steps, true);
        foreach ($steps as $key => $value){   
        $new    = $_POST[$value["name"]];
        $data->template =  str_replace($value["name"], $new, $data->template);
        }

        $template       = $data->template;
        $cipher     = 'AES-128-ECB';
        $key        = $this->generateRandomString();
        $content    = openssl_encrypt($template, $cipher, $key);

        $process    = New OrdersController;
        $process    = $process->store($data->id, $content, $key, $data->price);     
       

        return view('pages.finish', compact('data', 'page'));

    }

    function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*.,+-/';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function pay (Request $request)
    {


        return "DÖKÜMAN ÖDEME";
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
        $slug   =   explode("-", $slug);
        $page   =   Page::where('slug', 'categories')->firstOrFail();
        $data   =   Document::with('get_doc_type')->where('sub_cat',$slug[0])->orderby('id', 'desc')->cursorPaginate(config('constants.paginate'));
        $query  =   $slug[1];
        return view('pages.result', compact('data', 'query', 'page'));
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
