<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagController;

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
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    //carrinho
});      


Route::group(['middleware' => 'isAdmin'], function(){
//Product, Category, Tags Rotas                         //funções isentas da rota e suas regras
Route::resource('/product', ProductsController::class, ['except' => ['show']]);
Route::resource('/category', CategoriesController::class);
Route::resource('/tag', TagController::class);

//Lixeiras
Route::get('/trash/product', [ProductsController::class, 'trash'])->name('product.trash');
Route::get('/trash/category', [CategoriesController::class, 'trash'])->name('category.trash');
Route::get('/trash/tag', [TagController::class, 'trash'])->name('tag.trash');

//Restauração
Route::patch ('product/restore/{id}', [ProductsController::class, 'restore'])->name('product.restore');
Route::patch ('category/restore/{id}', [CategoriesController::class, 'restore'])->name('category.restore');
Route::patch ('tag/restore/{id}', [TagController::class, 'restore'])->name('tag.restore')->middleware(['auth']);

});

                                                        //funções permitidas da rota
Route::resource('/product', ProductsController::class, ['only' => ['show']]);