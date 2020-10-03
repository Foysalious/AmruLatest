<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\homeImageController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\LinkController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\SellingHistory;

use App\Http\Controllers\Frontend\FrontendController;

use App\Http\Controllers\InvoiceController;

use App\Models\Backend\Cart;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Backend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();


Route::group(['prefix'=>'dashboard', 'middleware'=>['auth','can:superadmin']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('backend_dashboard');

    //category route start
    Route::group(['prefix' => 'category'], function(){
        Route::get('/',[CategoryController::class, 'index'])->name('category.show');
        Route::post('/store',[CategoryController::class,'store'])->name('category.store');
        Route::post('/update/{category:id}',[CategoryController::class,'update'])->name('category.update');
        Route::post('/delete/{category:id}',[CategoryController::class,'destroy'])->name('category.delete');
    });
    //category route end

    //Banner route start
    Route::group(['prefix' => 'banner'], function(){
        Route::get('/',[homeImageController::class, 'index'])->name('bannerShow');
        Route::post('/store',[homeImageController::class,'store'])->name('bannerStore');
        Route::post('/update/{id}',[homeImageController::class,'update'])->name('bannerUpdate');
        Route::post('/delete/{id}',[homeImageController::class,'destroy'])->name('bannerDelete');
    });
    //Banner route end

    //Slider route start
    Route::group(['prefix' => 'slider'], function(){
        Route::get('/',[SliderController::class, 'index'])->name('sliderShow');
        Route::post('/store',[SliderController::class,'store'])->name('sliderStore');
        Route::post('/update/{slider:id}',[SliderController::class,'update'])->name('sliderUpdate');
        Route::post('/delete/{slider:id}',[SliderController::class,'destroy'])->name('sliderDelete');
    });
    //Slider route end
    //Contact Route Start
    Route::group(['prefix' => 'contact'], function(){
        Route::get('/',[ContactController::class, 'index'])->name('contactShow');
        Route::post('/store',[ContactController::class,'store'])->name('contactStore');
        Route::post('/update/{contact:id}',[ContactController::class,'update'])->name('contactUpdate');
        Route::post('/delete/{contact:id}',[ContactController::class,'destroy'])->name('contactDelete');
    });
    //Contact Route Start

       //Link Route Start
       Route::group(['prefix' => 'link'], function(){
        Route::get('/',[LinkController::class, 'index'])->name('linkShow');
        Route::post('/store',[LinkController::class,'store'])->name('linkStore');
        Route::post('/update/{link:id}',[LinkController::class,'update'])->name('linkUpdate');
        Route::post('/delete/{link:id}',[LinkController::class,'destroy'])->name('linkDelete');
    });
    //Link Route Start
    //logo route start
    Route::group(['prefix' => 'logo'], function(){
        Route::get('/',[LogoController::class, 'index'])->name('logo.show');
        Route::post('/update/{logo:id}',[LogoController::class, 'update'])->name('logo.update');
    });
    //logo route end

    //product route start
    Route::group(['prefix' => 'product'], function(){
        Route::get('/',[ProductController::class, 'index'])->name('product.show');
        Route::post('/store',[ProductController::class,'store'])->name('product.store');
        Route::get('/edit/{product:id}',[ProductController::class,'edit'])->name('product.edit');
        Route::post('/update/{product:id}',[ProductController::class,'update'])->name('product.update');
        Route::post('/delete/{product:id}',[ProductController::class,'destroy'])->name('product.delete');

        Route::get('/trash',[ProductController::class, 'trash'])->name('product.trash');
        Route::post('/restore/{product:id}',[ProductController::class,'restore'])->name('product.restore');
        Route::post('/pDelete/{product:id}',[ProductController::class,'pDelete'])->name('product.pDelete');

        Route::post('/waste/{product:id}',[ProductController::class,'waste'])->name('waste.product');
        Route::get('/wasteProduct',[ProductController::class,'wasteShow'])->name('waste.show');

    });
    //product route end

    //supplier route start
    Route::group(['prefix' => 'supplier'], function(){
        Route::get('/',[SupplierController::class, 'index'])->name('supplier.show');
        Route::post('/store',[SupplierController::class,'store'])->name('supplier.store');
    });
    //supplier route end

    //selling history route start
    Route::group(['prefix'=>'selling-history'],function(){

        //pending order start
        Route::get('/pending',[SellingHistory::class,'pending'])->name('pending.show');
        Route::get('/show-invoice/{invoice:id}',[SellingHistory::class,'showInvoice'])->name('invoice.show');
        Route::get('/confirmed-order/{invoice:id}',[SellingHistory::class,'confirmOrder'])->name('confirm-order');
        //pending order end

        //confirmed order start
        Route::get('/confirmed',[SellingHistory::class,'confirmed'])->name('confirmed.show');
        Route::get('/show-confirmed-invoice/{invoice:id}',[SellingHistory::class,'showConfirmedInvoice'])->name('confirmed.invoice.show');
        Route::get('/delivered-order/{invoice:id}',[SellingHistory::class,'deliveredOrder'])->name('delivered-order');
        //confirmed order end

        //delivered order show start
        Route::get('/delivered',[SellingHistory::class,'delivered'])->name('delivered.show');
        Route::get('/show-delivered-invoice/{invoice:id}',[SellingHistory::class,'showDeliveredInvoice'])->name('delivered.invoice.show');
        //delivered order show end

        //cancelled order
        Route::get('/cancel',[SellingHistory::class,'cancel'])->name('cancel.show');
        Route::get('/show-cancel-invoice/{invoice:id}',[SellingHistory::class,'showCancelInvoice'])->name('cancel.invoice.show');
        Route::get('/cancelled-order/{invoice:id}',[SellingHistory::class,'cancelledOrder'])->name('cancelled-order');




    });
    
    //selling history route end

    //purchase history route start
    Route::group(['prefix' => 'purchase-history'], function(){
        Route::get('/',[SupplierController::class, 'p_history'])->name('phistory.show');
        Route::delete('/delete/{invoice:id}',[SupplierController::class, 'p_history_delete'])->name('history.delete');
    });
    //purchase history route end


    //my profile route start
    Route::group(['prefix' => 'my-profile'], function(){
        Route::get('/{user:id}',[ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update/{user:id}',[ProfileController::class,'update'])->name('profile.update');
        Route::post('/update-password/{user:id}',[ProfileController::class,'updatePassword'])->name('password.update');
        Route::post('/delete-profile/{user:id}',[ProfileController::class,'destroy'])->name('profile.delete');
    });
    //my profile route end

     //my profile route start
     Route::group(['prefix' => 'about'], function(){
        Route::get('/',[AboutController::class, 'index'])->name('aboutShow');
        Route::post('/store',[AboutController::class,'store'])->name('aboutStore');
        Route::post('/update/{about:id}',[AboutController::class,'update'])->name('aboutUpdate');
        Route::post('/delete/{about:id}',[AboutController::class,'destroy'])->name('aboutDelete');
    });
    //my profile route end

    Route::get('/showNewsletter',[FrontendController::class,'show'])->name('showNewsletter');
    Route::get('/showcontactUS', [FrontendController::class, 'contactusindex'])->name('ContactMessage');



});







/*
|--------------------------------------------------------------------------
| Register superadmin Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::post('/register', [RegisterController::class,'registerSuperAdmin'])->name('register.superadmin');
Route::post('/customer-register', [RegisterController::class,'registerCustomer'])->name('register.customer');
Route::post('/customer-login', [loginController::class,'loginCustomer'])->name('login.customer');

Route::post('/add_to_cart', [CartController::class, 'add_to_cart']);
Route::get('/get_cart', [CartController::class, 'get_cart']);
Route::delete('/delete_cart/{id}', [CartController::class, 'delete_cart']);
Route::put('/update_cart/{id}', [CartController::class, 'update_cart']);





//Socialite Facebook and google login
	
Route::get('/customerlogin/google', [LoginController::class, 'googleLogin']);
Route::get('/customerlogin/google/callback', [LoginController::class, 'redirectGoogle']);

Route::get('/customerlogin/facebook', [LoginController::class, 'facebookLogin']);
Route::get('/customerlogin/facebook/callback', [LoginController::class, 'redirectFacebook']); 







/*
|--------------------------------------------------------------------------
| Frontend Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/checkout',[FrontendController::class,'checkout'])->name('checkout')->middleware('customer_auth');
Route::get('/contact',[FrontendController::class,'contact'])->name('contact');
Route::get('/customerlogin',[FrontendController::class,'login'])->name('customerlogin');
Route::get('/product_details/{product:slug}',[FrontendController::class,'productDetails'])->name('productDetails');
Route::get('/profile',[FrontendController::class,'profile'])->name('profile')->middleware('customer_auth');
Route::get('/subcategory/{category:slug}',[FrontendController::class,'subcat'])->name('subcat');
Route::get('/shop/{subcat:slug}',[FrontendController::class,'shop'])->name('shop');
Route::get('/signup',[FrontendController::class,'signup'])->name('signup');
Route::post('/priceFilter/{subcat:slug}/',[FrontendController::class,'shopFilter'])->name('shopFilter');
Route::post('/place/order/for/new/order/for/user/new/order/and/welcome', [InvoiceController::class, 'create_order'])->name('place_order')->middleware('customer_auth');
Route::post('/search',[FrontendController::class,'search'])->name('search');

//Socialite Facebook and google login

Route::get('/login/facebook', [LoginController::class, 'redirectToFacebookProvider']);
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookProviderCallback']);


Route::get('/excel', [InvoiceController::class, 'export'])->name('download_today');
Route::post('/export/pick', [InvoiceController::class, 'exportToDateFromDate'])->name('report_picker');



