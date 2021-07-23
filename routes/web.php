<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Route gồm 2 thành phần:
/*
 * - URL: Đường dẫn
 * - Closure - Hàm vô danh - Thực thi hành đông
 * */

Route::get('/', function () {
        return view('welcome');
});
Route::prefix('user')->group(function (){
    Route::get('/login', [\App\Http\Controllers\UserController::class, 'checkInput'])->name('login');
    Route::post('/login', [\App\Http\Controllers\UserController::class, 'login']);
});

//Route::get('/products',[HomeController::class,'index']);
//Route::get('/login',[HomeController::class,'showLogin']);


Route::prefix('products')->group(function (){
    Route::get('/',[ProductController::class,'index']);
    Route::get('create',[ProductController::class,'store'])->prefix('products.create');
});

Route::prefix('users')->group(function (){

    Route::get('/{name}',[HomeController::class,'showProfile'])->name('profile');
    Route::get('create',[HomeController::class,'store'])->name('users.create');
});
Route::prefix('customers')->group(function (){
    Route::get('/search', [CustomerController::class, 'search'])->name('search');
    Route::get('/',[CustomerController::class,'index'])->name('customers.list');
    Route::get('/create',[CustomerController::class,'create'])->name('customers.create');
    Route::post('/create',[CustomerController::class,'store']);
    Route::get('/{customerNumber}',[CustomerController::class,'destroy'])->name('customer.delete');
    Route::get('profile/{id}',[CustomerController::class,'showProfile'])->name('customers.profile')->middleware('checkCity');
    Route::get('edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::post('edit/{id}',[CustomerController::class,'update']);
});

//Route::get('/products','HomeController@index');
//CRUD
//GET

//POST

//PUT

//DELETE

//ANY

//PATCH

//MATCH

//RESOURCE

//Route::resource('products',[ProductController::class]);
