<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
/*Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    /*Route::get('client',[App\Http\Controllers\Admin\ClientController::class, 'index']);
    Route::get('add-client',[App\Http\Controllers\Admin\ClientController::class, 'create']);
    Route::post('add-client',[App\Http\Controllers\Admin\ClientController::class, 'store']);
    Route::get('edit-client/{client_id}',[App\Http\Controllers\Admin\ClientController::class, 'edit']);
    Route::put('update-client/{client_id}',[App\Http\Controllers\Admin\ClientController::class, 'update']);
    Route::get('delete-client/{client_id}',[App\Http\Controllers\Admin\ClientController::class, 'destroy']);
    Route::get('produit',[App\Http\Controllers\Admin\ProduitController::class, 'index']);
    Route::get('add-produit',[App\Http\Controllers\Admin\ProduitController::class, 'create']);
    Route::post('add-produit',[App\Http\Controllers\Admin\ProduitController::class, 'store']);
    Route::get('edit-produit/{product_id}',[App\Http\Controllers\Admin\ProduitController::class, 'edit']);
    Route::put('update-produit/{product_id}',[App\Http\Controllers\Admin\ProduitController::class, 'update']);
    Route::get('delete-produit/{product_id}',[App\Http\Controllers\Admin\ProduitController::class, 'destroy']);
    Route::get('step1',[App\Http\Controllers\Admin\RapportController::class, 'create1']);
    Route::post('step1',[App\Http\Controllers\Admin\RapportController::class, 'store1']);
    Route::get('step2',[App\Http\Controllers\Admin\RapportController::class, 'edit2']);
    Route::put('step2',[App\Http\Controllers\Admin\RapportController::class, 'update2']);
    Route::get('step3/{visite_id}',[App\Http\Controllers\Admin\RapportController::class, 'create3']);*/
});

Route::prefix('admin')->middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('client',[App\Http\Controllers\Admin\ClientController::class, 'index']);
    Route::get('add-client',[App\Http\Controllers\Admin\ClientController::class, 'create']);
    Route::post('add-client',[App\Http\Controllers\Admin\ClientController::class, 'store']);
    Route::get('edit-client/{client_id}',[App\Http\Controllers\Admin\ClientController::class, 'edit']);
    Route::put('update-client/{client_id}',[App\Http\Controllers\Admin\ClientController::class, 'update']);
    Route::get('delete-client/{client_id}',[App\Http\Controllers\Admin\ClientController::class, 'destroy']);
    Route::get('produit',[App\Http\Controllers\Admin\ProduitController::class, 'index']);
    Route::get('add-produit',[App\Http\Controllers\Admin\ProduitController::class, 'create']);
    Route::post('add-produit',[App\Http\Controllers\Admin\ProduitController::class, 'store']);
    Route::get('edit-produit/{product_id}',[App\Http\Controllers\Admin\ProduitController::class, 'edit']);
    Route::put('update-produit/{product_id}',[App\Http\Controllers\Admin\ProduitController::class, 'update']);
    Route::get('delete-produit/{product_id}',[App\Http\Controllers\Admin\ProduitController::class, 'destroy']);
    Route::get('step1',[App\Http\Controllers\Admin\RapportController::class, 'create1']);
    Route::post('step1',[App\Http\Controllers\Admin\RapportController::class, 'store1']);
    Route::get('step2',[App\Http\Controllers\Admin\RapportController::class, 'edit2']);
    Route::put('step2',[App\Http\Controllers\Admin\RapportController::class, 'update2']);
    Route::get('step3/{visite_id}',[App\Http\Controllers\Admin\RapportController::class, 'create3']);
    Route::post('step3',[App\Http\Controllers\Admin\RapportController::class, 'store3']);
    Route::get('step4/{visite_id}',[App\Http\Controllers\Admin\RapportController::class, 'create4']);

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});
Auth::routes();
//Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
Route::get('/home', [DashboardController::class, 'index'])->name('home');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
