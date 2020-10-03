<?php

namespace App\Http\Controllers;

use App\Models\Backend\Product;
use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Mail\CustomerOrderPlace;
use Illuminate\Support\Facades\Mail;
use Excel;
use App\Exports\ReportExport;
use Carbon\Carbon;

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
                    $order->product_id = $product->id;
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
            
            Mail::to($invoice->user->email)->send( new CustomerOrderPlace($invoice,'Your order is placed. Please wait for confirmation') );
            Mail::to('amru@gmail.com')->send( new CustomerOrderPlace($invoice,'Order placed') );

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





    public function export(){
        $data = Order::whereDate('updated_at', Carbon::today())->where("status", 3)->get();

        $export = new ReportExport();
        return Excel::download($export->getDownloadByQuery($data), 'report - '.Carbon::today()->toDateString().'.csv');


    }


    public function exportToDateFromDate(Request $request){
        $data = Order::whereBetween('updated_at', [Carbon::parse($request->from),Carbon::parse($request->to)->addDay()])->orderBy('id','desc')->get();

        $export = new ReportExport();
        return Excel::download($export->getDownloadByQuery($data), 'report - '.Carbon::parse($request->from)->toDateString().' - '.Carbon::parse($request->to)->toDateString().'.csv');


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
