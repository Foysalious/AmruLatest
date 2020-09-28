<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use App\Models\Backend\Waste;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->where('status',1)->get();
        return view('backend.pages.product.manage', compact('products'));
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
        if( $request->cat_id == 'NAN' ){
            $request->session()->flash('createFailed','Please select product category');
            return back();
        }
        else{
            $request->validate([
                'name'          =>  'required',
                'description'   =>  'required',
                'cat_id'        =>  'required',
                'main_img'      =>  'required',
                'sub_img_one'   =>  'required',
                'sub_img_two'   =>  'required',
                'r_price'       =>  'required',
                'size'       =>  'required',
            ]);
    
            $product = new Product();
    
            $product->name          = $request->name;
            $product->slug          = Str::slug($request->name);
            $product->description   = $request->description;
            $product->cat_id        = $request->cat_id;
            $product->regular_price = $request->r_price;
            $product->offer_price   = $request->o_price;
            $product->size   = $request->size;
            $product->quantity      = 0;
            $product->is_packaged   = $request->package;
            $product->is_featured   = $request->featured;
            $product->status        = $request->status;
            $product->save();
            
            $allImage = [0 => $request->main_img, 1 => $request->sub_img_one, 2 => $request->sub_img_two];
            
            foreach($allImage as $image){
                if($image){
                    $name = time().Str::random(12).".png";
                    Image::make($image)->encode('png', 100)->save(public_path('images/product/'.$name));
                    $pImage = new ProductImage();
                    $pImage->image = $name;
                    $pImage->product()->associate($product);
                    $pImage->save();
                }
            }
    
            $request->session()->flash('create','Product added');
            return back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('backend.pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        $request->validate([
            'name'          =>  'required',
            'description'   =>  'required',
            'cat_id'        =>  'required',
            'r_price'       =>  'required',
            'size'       =>  'required',
        ]);

        
        $product->name          = $request->name;
        $product->slug          = Str::slug($request->name);
        $product->description   = $request->description;
        $product->cat_id        = $request->cat_id;
        $product->regular_price = $request->r_price;
        $product->offer_price   = $request->o_price;
        $product->size          = $request->size;
        $product->is_packaged   = $request->package;
        $product->is_featured   = $request->featured;
        $product->status        = $request->status;
        $product->save();

        $allImage = [ 0 => $request->main_img, 1 => $request->sub_img_one, 2 => $request->sub_img_two];
        
        foreach($allImage as $key => $image){
            if($image){
                
                $existingImage = $product->images[$key];

                if(File::exists(public_path('images/product/'.$existingImage->image))){
                    File::delete(public_path('images/product/'.$existingImage->image));
                }
                $name = time().Str::random(12).".png";
                Image::make($image)->encode('png', 100)->save(public_path('images/product/'.$name));
               
                $existingImage->image = $name;
               
                $existingImage->save();
            }
        }
        $request->session()->flash('update','Product updated');
        return redirect()->route('product.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->status = 0;
        $product->save();
        $request->session()->flash('trash','Product moved to the inactive list');
        return back();
    }


    public function trash()
    {
        $products = Product::orderBy('id','desc')->where('status',0)->get();
        return view('backend.pages.product.trash', compact('products'));
    }
    public function restore(Request $request, Product $product)
    {
        $product->status = 1;
        $product->save();
        $request->session()->flash('restored','Product restored');
        return back();
    }

    public function pDelete(Request $request, Product $product)
    {
        

        foreach( $product->images as $productImage ){
            if(File::exists(public_path('images/product/'.$productImage->image))){
                File::delete(public_path('images/product/'.$productImage->image));
            }
        }
        
        $product->images()->delete();
        $product->delete();
        $request->session()->flash('pDelete','Product permanently deleted');
        return back();
    }

    public function wasteShow(){
        $wastes = Waste::orderBy('id','desc')->get();
        return view('backend.pages.product.waste', compact('wastes'));
    }

    // waste product 
    public function waste(Product $product, Request $request){
        $request->validate([
            'qty' => 'required'
        ]);
  
        $waste = new Waste();
        $waste->product()->associate($product);
        $waste->qty = $request->qty;
        if($waste->save()){
            $product->quantity -= $waste->qty;
            $product->save();
        }
        $request->session()->flash('waste',' '. $waste->qty .' Product wasted');
        return back();

    }
}

