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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Backend\Cart;
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
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

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