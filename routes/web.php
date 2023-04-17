<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuperAdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('home.userpage');
//});

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    route::get('/redirect',[HomeController::class,'redirect']);
    route::get('/view_catagory',[AdminController::class,'view_catagory']);
    route::post('/add_catagory',[AdminController::class,'add_catagory']);
    route::get('/delete_catagory/{id}',[AdminController::class,'delete_catagory']);

    route::get('/view_product',[AdminController::class,'view_product']);
    route::post('/add_product',[AdminController::class,'add_product']);
    route::get('/show_product',[AdminController::class,'show_product']);
    route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
    route::get('/update_product/{id}',[AdminController::class,'update_product']);
    route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

    route::get('/search',[AdminController::class,'searchdata']);

    route::get('/order',[AdminController::class,'order']);
    route::get('/delivered/{id}',[AdminController::class,'delivered']);

    //schools
    route::get('/view_schools',[AdminController::class,'view_schools']);
    route::post('/add_schools',[AdminController::class,'add_schools']);
    route::get('/delete_schools/{id}',[AdminController::class,'delete_schools']);

    //new rproducts admin
    route::get('/view_rproduct',[AdminController::class,'view_rproduct']);
    route::get('/show_rproduct',[AdminController::class,'show_rproduct']);
    route::post('/add_rproduct',[AdminController::class,'add_rproduct']);
    route::get('/delete_rproduct/{id}',[AdminController::class,'delete_rproduct']);
    route::get('/update_rproduct/{id}',[AdminController::class,'update_rproduct']);
    route::post('/update_rproduct_confirm/{id}',[AdminController::class,'update_rproduct_confirm']);




    //home controller

    route::get('/product_details/{id}',[HomeController::class,'product_details']);
    route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
    route::get('/show_cart',[HomeController::class,'show_cart']);
    route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

    route::get('/cash_order',[HomeController::class,'cash_order']);
    route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

    route::post('stripe/{totalprice}', [HomeController::class, 'stripePost'])->name('stripe.post');

    route::get('/show_order',[HomeController::class,'show_order']);

    route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

    route::get('/product_search',[HomeController::class,'product_search']);
    route::get('/products',[HomeController::class,'product']);
    route::get('/search_product',[HomeController::class,'search_product']);


    //membership
    route::get('/rproduct_details/{id}',[MemberController::class,'rproduct_details']);
    route::get('/rent/{id}',[MemberController::class,'rent']);
    route::get('/membership',[MemberController::class,'membership']);
    route::post('/paymembership',[MemberController::class,'paymembership']);
    route::post('postmembership', [MemberController::class, 'postmembership'])->name('postmembership');
    //display products for membership
    route::get('/rproducts',[MemberController::class,'rproduct']);
    route::get('/rproduct_details/{id}',[MemberController::class,'rproduct_details']);

    route::get('/rproduct_search',[MemberController::class,'rproduct_search']);
    route::post('/r_add_cart/{id}',[MemberController::class,'r_add_cart']);
    route::post('/r_add_cartrent/{id}',[MemberController::class,'r_add_cartrent']);

    Route::get('/rentstripe/{totalprice}', [MemberController::class, 'rentstripe']);
    Route::post('/rentstripe/{totalprice}', [MemberController::class, 'rentstripePost'])->name('rstripe.post');

    route::get('/show_rent',[MemberController::class,'show_rent']);
    route::get('/remove_rent/{id}',[MemberController::class,'remove_rent']);







    //superadmin
    route::get('/show_users',[SuperAdminController::class,'show_users']);
    route::get('/show_admins',[SuperAdminController::class,'show_admins']);
    route::get('/makeadmin/{id}',[SuperAdminController::class,'makeadmin']);
    route::get('/search_user',[SuperAdminController::class,'search_user']);
    route::get('/delete_user/{id}',[SuperAdminController::class,'delete_user']);



});
