<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

/* Solo para el rol de admin y economato */
Route::resource('categoria', 'App\Http\Controllers\CategoryController')->middleware('auth');
Route::resource('format', 'App\Http\Controllers\FormatController')->middleware('auth');
Route::resource('producte', 'App\Http\Controllers\ProductController')->middleware('auth');
Route::resource('informe', 'App\Http\Controllers\ReportController')->middleware('auth');
/* Solo para el rol de admin y economato */

Route::resource('comanda', 'App\Http\Controllers\OrderController')->middleware('auth'); // Rol
Route::resource('usuari', 'App\Http\Controllers\UserController')->middleware('auth'); // Rol

Auth::routes(['register' => false]);

Route::get('/comanda/create/order_exist', 'App\Http\Controllers\OrderController@exist')->middleware('auth');
Route::get('/teacher_orders', 'App\Http\Controllers\OrderController@teacher_orders')->middleware('auth');
Route::get('/informes/selects', 'App\Http\Controllers\ReportController@selects')->middleware('auth');
Route::get('/informes/resultado', 'App\Http\Controllers\ReportController@teacherOrders')->middleware('auth');
Route::get("/comandas/updateOrderAjax", 'App\Http\Controllers\OrderController@updateOrderAjax')->middleware('auth');
Route::get("/comandas/updateOrderLineAjax", 'App\Http\Controllers\OrderLineController@updateOrderLineAjax')->middleware('auth');

Route::get("api/comanda/create",'App\Http\Controllers\OrderController@jsonTableCreate')->middleware('auth');
Route::get("api/producte",'App\Http\Controllers\ProductController@jsonTableIndex')->middleware('auth');
Route::get("api/categoria",'App\Http\Controllers\CategoryController@jsonTableIndex')->middleware('auth');
Route::get("api/format",'App\Http\Controllers\FormatController@jsonTableIndex')->middleware('auth');
Route::get("api/usuari",'App\Http\Controllers\UserController@jsonTableIndex')->middleware('auth');
Route::get("api/comanda",'App\Http\Controllers\OrderController@jsonTableIndex')->middleware('auth');

/**
* Avís Legal
* Política i privacitat de Cookies
*/
Route::get("avis-legal",function(){
    return view('policies.legal_warning');
});
Route::get("politica-privacitat",function(){
    return view('policies.privacy');
});
Route::get("cookies",function(){
    return view('policies.cookies');
});