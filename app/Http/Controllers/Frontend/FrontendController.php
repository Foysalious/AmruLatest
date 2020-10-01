<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Frontend\newsLetter;

class FrontendController extends Controller
{
    
    //index show
    public function index(){
        return view('frontend.pages.index');
    }

     //about show
     public function about(){
        return view('frontend.pages.about');
    }

     //checkout show
     public function checkout(){
        return view('frontend.pages.checkout');
    }

     //contact show
     public function contact(){
        return view('frontend.pages.contact');
    }

     //login show
     public function login(){
        return view('frontend.pages.login');
    }

     //Product-details show
     public function productDetails(Product $product){
         $relatedProducts = Product::orderBy('id','desc')->where('status',1)->where('cat_id', $product->cat_id)->where('id','!=',$product->id)->get();
        return view('frontend.pages.product-details',compact('product','relatedProducts'));
    }

     //profile show
     public function profile(){
        return view('frontend.pages.profile');
    }

    public function subcat(Category $category){
        return view('frontend.pages.subCategory', compact('category'));
    }

       //shop show
       public function shop(Category $subcat){
           
           $products = Product::orderBy('id','desc')->where('status',1)->where('cat_id', $subcat->id)->paginate(20);
           $rproducts = Product::orderBy('id','desc')->where('status',1)->where('cat_id', $subcat->id)->get();
            return view('frontend.pages.shop', compact('subcat','products','rproducts'));
    }

    public function shopFilter(Request $request, Category $subcat) {
        $query = Product::orderBy('id','desc')->where('cat_id',$subcat->id);
        
       
        if($request->min_price && $request->max_price){
            // This will only executed if you received any price
            // Make you you validated the min and max price properly
            $maxPrice=$request->max_price;
            $minPrice=$request->min_price;
            $query = $query->where('regular_price','>=',$request->min_price);
            $query = $query->where('regular_price','<=',$request->max_price);
        }
        $products = $query->paginate(6);
        return view('frontend.pages.price_filter', compact('products','subcat','maxPrice','minPrice'));
      }

      public function storeNewsletter(Request $request){
        $news = new newsLetter();

        $news->email  = $request->email;
        $news->save();
        return Response()->json(
            $news
        , 200);
    }

    public function search(Request $request)
    {
      $text = $request->name;
      $search=Product::orWhere('name', 'LIKE', "%$request->name%")->orWhere('slug', 'LIKE', "%$request->name%")->orWhere('description', 'LIKE', "%$request->name%")->paginate(12);
        // return $search;
    return view('frontend.pages.search',compact('search','text'));
    }


     //signup show
     public function signup(){
        return view('frontend.pages.signup');
    }

}
