<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\NotificationController;

class ContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return "ÖMERasdasdsd";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = Page::where('slug', 'contact')->firstOrFail();
        return view("pages.contact", compact('page'));
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
            $validated = $request->validate([
                'type' => 'required',
                'secretCaptcha' => 'required',
                'name' => 'required',
                'email' => 'required',
                'gsm' => 'required',
                'message' => 'required|max:3000',
                'captcha' => 'required',
            ]);
            ($request->secretCaptcha != $request->captcha) ? abort(401) : true;
            $save = Contact::create($request->all());
            $notification = new NotificationController();
            $notification->store('İletişim', $request->message);
            return redirect()->back()->with('message', 'İşlem Başarılı');
        } catch (\Exception $e) {
            return redirect()->back()->with('message', 'İşlem Başarısız');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
