<?php

use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

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

//rota para exibir a página para registar as encomendas
Route::get('packages',[PackageController::class,'index'])->name('packages');

//rota para guardar a encomenda
Route::post('packages/create',[PackageController::class,'create'])->name('packages.create');

//rota para exibir a lista de produtos da encomenda
Route::get('packages/list',[PackageController::class,'list'])->name('packages.list');

//rota para eliminar um produto
Route::get('packages/{package}',[PackageController::class,'delete'])->name('packages.delete');

//rota para eliminar a tabela Packages
Route::post('packages/destroy',[PackageController::class,'destroy'])->name('packages.destroy');

/* Route::get('/email', function(){
    Mail::to('mari01barreto@hotmail.com')->send(new SendMail());
    echo 'Email Enviado';
}); */
