<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Mail\OrderShipped;
use App\Models\Page;
use App\Models\Improve;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
    public function show($slug, Request $request)
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
        $data   =   Document::where('slug', $request->slug)->with('get_doc_type',)->firstOrFail();
        $steps  =   json_decode($data->steps, true);
        foreach ($steps as $key => $value){   
        $new    = $_POST[$value["name"]];
        $data->template =  str_replace($value["name"], $new, $data->template);
        }
        $data->template =  str_replace("{buguntarih}", date("d/m/Y"), $data->template);

        $template   = $data->template;
        $cipher     = 'AES-128-ECB';
        $key        = $this->generateRandomString();
        $content    = openssl_encrypt($template, $cipher, $key);
        setcookie("key", $key, time() + (24 * 60 * 60));
        $process    = New OrdersController;
        $process    = $process->store($data->id, $content, $key, $data->price,$data->name);     
       

        return view('pages.finish', compact('data', 'page','process'));

    }

    function generateRandomString($length = 30)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*.,+-';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function paysuccess ()
    {
        $id = $_POST['platform_order_id'];
        if ($id!=""){

        }else{
            echo "Session Error";
            abort(401);
        }
        $page = Page::where('slug', 'success')->firstOrFail();
        if (@$_POST["status"]!= "success"){
            echo "Shopier Error";
            abort(401);
        }
        $order =  Orders::where('id', $id)->firstOrFail();
        $data = $order->content;
        $cipher = 'AES-128-ECB';
        $key = $order->key;
        $decoded = openssl_decrypt($data, $cipher, $key);

        if (!$decoded) {
            echo "Hatalı bir değer gönderdiniz";
            abort(401);
        }else{
        $order->pay = 1;
        $order->save();
        $notification = new NotificationController();
        $notification->store('Yeni Ödeme', $order->price . ' ₺ ödeme alındı :{');
            Mail::to($order->user_email)->send(new OrderShipped($order));

        }
        return view('pages.success', compact('order','page', 'decoded'));
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
