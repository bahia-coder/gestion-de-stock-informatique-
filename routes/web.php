<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\MarcheController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TirbunaleController;
use App\Http\Controllers\CommandeController;
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
    return view('login');
 });

  Route::controller(FournisseurController::class)->group(function () {
    //Route::get('/orders/{id}', 'show');
    Route::get('/fournisseurs', 'index')->name('fournisseurs.index');
    Route::get('/fournisseurs/create', 'create')->name('fournisseurs.create');
    Route::post('/fournisseurs/store', 'store');
    Route::post('/fournisseurs/update/{id}', 'update');
    Route::get('/fournisseurs/edit/{id}', 'edit')->name('fournisseurs.edit');
    Route::get('/fournisseurs/show/{id}', 'show')->name('fournisseurs.show');
    Route::get('/fournisseurs/delete/{id}', 'destroy')->name('fournisseurs.delete');
});
Route::get('categories',[CategorieController::class,'index'])->name('categorie.index');
  Route::get('categories/show/{id}',[CategorieController::class,'show'])->name('categories.show');
  Route::get('categories/create',[CategorieController::class,'create'])->name('categories.create');
  Route::post('categories/update/{id}',[CategorieController::class,'update'])->name('categories.update');
  Route::post('categories/store',[CategorieController::class,'store'])->name('categories.store');
  Route::get('categories/edit/{id}',[CategorieController::class,'edit'])->name('categorie.edit');
  Route::get('categories/delete/{id}',[CategorieController::class,'destroy'])->name('categorie.destroy');


  Route::controller(StockController::class)->group(function () {
    //Route::get('/orders/{id}', 'show');
    Route::get('/stocks', 'index')->name('stocks.index');
    Route::get('/stocks/create', 'create')->name('stocks.create');
    Route::post('/stocks/store', 'store');
    Route::post('/stocks/update/{id}', 'update');
    Route::get('/stocks/edit/{id}', 'edit')->name('stocks.edit');
    Route::get('/stocks/show/{id}', 'show')->name('stocks.show');
    Route::get('/stocks/showArticlesCommandés/{id}', 'showArticlesCommandés')->name('stocks.showArticlesCommandés');
    Route::get('/stocks/delete/{id}', 'destroy')->name('stocks.delete');
});
Route::controller(MarcheController::class)->group(function () {
  //Route::get('/orders/{id}', 'show');
  Route::get('/marcher', 'index')->name('marcher.index');
  Route::get('/marcher/create', 'create')->name('marcher.create');
  Route::post('/marcher/store', 'store');
  Route::post('/marcher/update/{id}', 'update');
  Route::get('/marcher/edit/{id}', 'edit')->name('marcher.edit');
  Route::get('/marcher/show/{id}', 'show')->name('marcher.show');
  Route::get('/marcher/delete/{id}', 'destroy')->name('marcher.delete');
});
Route::get('tirbunales',[TirbunaleController::class,'index'])->name('tirbunale.index');
Route::get('tirbunales/show/{id}',[TirbunaleController::class,'show'])->name('tirbunale.show');
Route::get('tirbunales/create',[TirbunaleController::class,'create'])->name('tirbunale.create');
Route::post('tirbunales/update/{id}',[TirbunaleController::class,'update'])->name('tirbunale.update');
Route::post('tirbunales/store',[TirbunaleController::class,'store'])->name('tirbunale.store');
Route::get('tirbunales/edit/{id}',[TirbunaleController::class,'edit'])->name('tirbunale.edit');
Route::get('tirbunales/destroy/{id}',[TirbunaleController::class,'destroy'])->name('tirbunale.delete');
Route::controller(CommandeController::class)->group(function () {
    //Route::get('/orders/{id}', 'show');
    Route::get('/commandes', 'index')->name('commandes.index');
    Route::get('/commandes/create', 'create')->name('commandes.create');
    Route::post('/commandes/store', 'store')->name('commandes.store');
    Route::post('/commandes/update/{id}', 'update');
    Route::get('/commandes/edit/{id}', 'edit')->name('commandes.edit');
    Route::get('/commandes/confirmer/{id}', 'confirmer')->name('commandes.confirmer');
    Route::get('/commandes/show/{id}', 'show')->name('commandes.show');
    Route::get('/commandes/decharge/{id}', 'decharge')->name('commandes.decharge');
    Route::get('/commandes/pdf/{id}', 'pdf')->name('commandes.pdf');
    Route::get('/commandes/delete/{id}', 'destroy')->name('commandes.delete');
    Route::get('/home','afficherGraphiqueCommandes');
});



