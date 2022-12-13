<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Values;
use App\Http\Controllers\UploadController;
use Throwable;

class PanelDocuments extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data   =   Document::with('get_doc_type', 'get_sub_doc_type', 'get_type', 'get_cat')->orderBy('id', 'desc')->get();
        return view("panel.documents.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doc_type       =   Values::where('type', 'doc_type')->get();
        $sub_doc_type   =   Values::where('type', 'sub_doc_type')->get();
        $type           =   Values::where('type', 'type')->get();
        $cat            =   Values::where('type', 'cat')->get();
        $sub_cat        =   Values::where('type', 'sub_cat')->get();
        return view("panel.documents.create", compact('doc_type','sub_doc_type','type', 'cat','sub_cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {      
        $stepsSub = array();
        foreach ($request->StepType as $key => $value) {
            array_push($stepsSub, ["type" => strtolower($request->StepType[$key]), "name" => strtolower($request->StepName[$key]),"label" => $request->StepLabel[$key], "description" => $request->StepDescription[$key]]);
        }
        $stepsSub = json_encode($stepsSub, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT);
        $slug   = $this->slugify($request->name);
        if ($request->file('file')) {
            $up             =   new UploadController();
            $attachment     =   $up->upload($request->file('file'), 'Documents');
        }else{
            $attachment     =   null;
        }
        $data = Document::create([
            'slug'          =>  $slug,
            'doc_type'      =>  $request->doc_type,
            'sub_doc_type'  =>  $request->sub_doc_type,
            'type'          =>  $request->type,
            'cat'           =>  $request->cat,
            'sub_cat'       =>  $request->sub_cat,
            'name'          =>  $request->name,
            'description'   =>  $request->description,
            'law'           =>  $request->law,
            'steps'         =>  $stepsSub,
            'template'      =>  null,
            'attachment'    =>  $attachment,
            'time'          =>  $request->time,
            'price'         =>  $request->price
        ]);
        } catch (Throwable $e) {
            report($e);
            return false;
        }

        return redirect()->route('panel.documentpanel.index')->with('success','İşlem Başarılı');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doc_type       =   Values::where('type', 'doc_type')->get();
        $sub_doc_type   =   Values::where('type', 'sub_doc_type')->get();
        $type           =   Values::where('type', 'type')->get();
        $cat            =   Values::where('type', 'cat')->get();
        $sub_cat        =   Values::where('type', 'sub_cat')->get();
        $data           =   Document::find($id);
        return view("panel.documents.edit", compact('doc_type', 'sub_doc_type', 'type', 'cat', 'sub_cat', 'data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $document = Document::find($id);
        $stepsSub = array();
        foreach ($request->StepType as $key => $value) {
            array_push($stepsSub, ["type" => strtolower($request->StepType[$key]), "name" => strtolower($request->StepName[$key]), "label" => $request->StepLabel[$key], "description" => $request->StepDescription[$key]]);
        }
        $stepsSub = json_encode($stepsSub, JSON_UNESCAPED_UNICODE | JSON_FORCE_OBJECT);

        $document->doc_type      =  $request->doc_type;
        $document->sub_doc_type  =  $request->sub_doc_type;
        $document->type          =  $request->type;
        $document->cat           =  $request->cat;
        $document->sub_cat       =  $request->sub_cat;
        $document->name          =  $request->name;
        $document->description   =  $request->description;
        $document->law           =  $request->law;
        $document->steps         =  $stepsSub;
        $document->template      =  $request->template;
        $document->time          =  $request->time;
        $document->price         =  $request->price;
        $document->save();
        return redirect()->route('panel.documentpanel.index')->with('success', 'İşlem Başarılı');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public static function slugify($text, string $divider = '-')
    {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}
