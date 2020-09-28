<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
        $id = $request->id;    
        
        $product = Product::find($id);
        
        $cart = [
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->images[0]->image,
            'qty' => 1,
            'price' => $product->offer_price ?  $product->offer_price : $product->regular_price,
            'total' => $product->offer_price ?  $product->offer_price : $product->regular_price

        ];

        $newCart = [];
        $exist = false;
        if($request->session()->get('cart')){
            $sessionCart = $request->session()->get('cart');
            

            foreach($sessionCart as $singleCart){
                if($singleCart['id'] == $cart['id']){
                    $singleCart['qty']++;
                    $singleCart['total'] +=  $cart['price'];
                    $exist = true;
                }
                array_push($newCart, $singleCart);
            }

            if(!$exist){
                array_push($newCart, $cart);
            }

        }else{
            array_push($newCart, $cart);
        }

        

        $request->session()->put('cart', $newCart);
        return $request->session()->get('cart');
    }
}
