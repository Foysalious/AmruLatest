<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmedOrder;
use App\Mail\DeliveredOrder;
use App\Mail\CancelledOrder;
use App\Models\Backend\Product;

class SellingHistory extends Controller
{

    //pending order start
    public function pending(){
        $invoices = Invoice::orderBy('id','desc')->where('status',1)->get();
        return view('backend.pages.history.index',compact('invoices'));
    }
    public function showInvoice(Invoice $invoice){
        return view('backend.pages.history.invoice',compact('invoice'));
    }

    public function confirmOrder(Invoice $invoice, Request $request){
        $invoice->status = 2;
        foreach( $invoice->order as $order ){
            $order->status = 2;
            $order->save();
        }
        $invoice->save();

        $request->session()->flash('confirmed','Order Confirmed');

        Mail::to($invoice->user->email)->send(new ConfirmedOrder($invoice, 'Your order is confirmed'));
        Mail::to('amrubazar@gmail.com')->send(new ConfirmedOrder($invoice, 'Order Confirmed'));
        return redirect()->route('pending.show');
        
    }   
    //pending order end










    //confirmed order start
    public function confirmed(){
        $invoices = Invoice::orderBy('id','desc')->where('status',2)->get();
        return view('backend.pages.history.confirmed.index',compact('invoices'));
    }
    public function showConfirmedInvoice(Invoice $invoice){
        return view('backend.pages.history.confirmed.invoice',compact('invoice'));
    }
    public function deliveredOrder(Invoice $invoice, Request $request){
        $invoice->status = 3;
        foreach( $invoice->order as $order ){
            $order->status = 3;
            $order->save();
            $product = Product::find($order->product_id);
            $product->quantity = $product->quantity - $order->qty;
            $product->save();
        }
        $invoice->save();

        

        $request->session()->flash('delivered','Order delivered');

        Mail::to($invoice->user->email)->send(new DeliveredOrder($invoice,'Your order is delivered'));
        Mail::to('amrubazar@gmail.com')->send(new DeliveredOrder($invoice,'Order delivered'));
        return redirect()->route('confirmed.show');
    }
    //confirmed order end







    //order cancelled
    public function cancel(){
        $invoices = Invoice::orderBy('id','desc')->where('status',4)->get();
        return view('backend.pages.history.cancel.index',compact('invoices'));
    }
    public function showCancelInvoice(Invoice $invoice){
        return view('backend.pages.history.cancel.invoice',compact('invoice'));
    }
    public function cancelledOrder(Invoice $invoice, Request $request){
        $invoice->status = 4;
        foreach( $invoice->order as $order ){
            $order->status = 4;
            $order->save();
        }
        $invoice->save();

        Mail::to($invoice->user->email)->send(new CancelledOrder($invoice,'Your order has been cancelled'));
        Mail::to('amrubazar@gmail.com')->send(new CancelledOrder($invoice,'Order cancelled'));

        $request->session()->flash('cancelled','Order cancelled');
        return back();
    }










    //delivered order start
    public function delivered(){
        $invoices = Invoice::orderBy('id','desc')->where('status',3)->get();
        return view('backend.pages.history.delivered.index',compact('invoices'));
    }
    public function showDeliveredInvoice(Invoice $invoice){
        return view('backend.pages.history.delivered.invoice',compact('invoice'));
    }






}
