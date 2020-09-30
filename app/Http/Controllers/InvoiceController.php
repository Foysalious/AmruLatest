<?php

namespace App\Http\Controllers;

use App\Models\Backend\Product;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class InvoiceController extends Controller
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
    public function create_order(Request $request)
    {
        $request->validate([
            "product_id.*" => 'required' ,
            "product_qty.*" => 'required|numeric',
            "phone" => 'required',
            'address' => 'required'
        ]);
        $invoice = new Invoice();
        $invoice->user()->associate($request->user());
        $invoice->delivery_charge = 100;
        $invoice->status = 1;
        $invoice->delivery_address = $request->address;
        $invoice->total = 0;
        $invoice->phone = $request->phone;
        $invoice->order_note = $request->note;
        if($invoice->save()){

            foreach($request->product_id as $key => $product_id){
                    $product = Product::find($product_id);
                    $order = new Order();
                    $order->product_name = $product->name;
                    $order->image = $product->images[0]->image;
                    $order->size = $product->size;
                    $order->unit_price = $product->offer_price ? $product->offer_price : $product->regular_price;
                    $order->qty = $request->product_qty[$key];
                    $order->total = $order->unit_price * $order->qty;
                    $order->invoice()->associate($invoice);
                    if($order->save()){
                        $invoice->total += $order->total;
                        $invoice->save();
                    }
            }


            $request->session()->forget('cart');
            Toastr::success('Order placed successfully. We will mail you soon.');
            return redirect()->route('index');
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
