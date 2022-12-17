<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Http\Requests\StoreOrdersRequest;
use App\Http\Requests\UpdateOrdersRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NotificationController;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrdersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($document_id, $content,$key,$price, $document_name)
    {
        $order   = Orders::create([
            'user_id'   => Auth::user()->id,
            'user_name'  => Auth::user()->name,
            'user_email' => Auth::user()->email,
            'document_id'  => $document_id,
            'document_name'=> $document_name,
            'content'   => $content,
            'key'       => $key,
            'price'     => $price,
            'statistics'=> date("Y-m"),
            'pay'       => 0            
        ]);
        if ($order){
            $notification = new NotificationController();
            $notification->store('Yeni Sipariş', Auth::user()->id . ' kullanıcısından yeni sipariş');
            return $order;
        }else{
            abort(500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrdersRequest  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrdersRequest $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
