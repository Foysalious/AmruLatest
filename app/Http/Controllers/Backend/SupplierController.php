<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\InventoryInvoice;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\ProductOrder;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->where('status',1)->get();
        return view('backend.pages.supplier.manage', compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'p_name.*' => 'required',
            'p_id.*' => 'required',
            'p_qty.*' => 'required',
            'p_u_price.*' => 'required',
        ]);

        $inventory_invoice = new InventoryInvoice();

        $inventory_invoice->name = $request->name ? $request->name : "Unknown";
        $inventory_invoice->address = $request->address ? $request->address : "Unknown";
        $inventory_invoice->contact = $request->phone ? $request->phone : "Unknown";
        $inventory_invoice->shop = $request->shop ? $request->shop : "Unknown";

        if($inventory_invoice->save()){
            foreach($request->p_name as $key => $value){
                $order = new ProductOrder();
                $order->invoice()->associate($inventory_invoice);
                $order->name = $value;
                $order->qty = $request->p_qty[$key];
                $order->unit_price = $request->p_u_price[$key];
                $order->total = $request->p_qty[$key] * $request->p_u_price[$key];
                
                $product = Product::find($request->p_id[$key]);
                $order->product()->associate($product);

                if($order->save()){
                    $product->quantity += $order->qty;
                    $product->save();
                }
            }
        }
        $request->session()->flash('success','Inventory created successfully');
        return back();

        


    }

    
    public function p_history(){
        return view('backend.pages.supplier.history');
    }

    public function p_history_delete(InventoryInvoice $invoice, Request $request){
        if( !is_null($invoice) ){
            foreach( $invoice->order as $order ){
                $product = $order->product;
                $product->quantity -= $order->qty;
                $product->save();
            }

            $invoice->order()->delete();
            $invoice->delete();
            $request->session()->flash('delete', 'History deleted successfully');
            return back();
        }
    }

}
