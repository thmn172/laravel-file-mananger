<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use \App\Models\password;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\TestController;
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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function(){
    return view('auth.login');
});

// Route::get('upload',[TestController::class, 'upload'])->name('upload');
Route::get('admin',[TestController::class, 'crud'])->name('crud');
Route::get('crud/add',[TestController::class, 'add'])->name('add.get');
// Route::post('crud/add',[TestController::class, 'postAdd'])->name('add.post');
Route::post('save',[TestController::class, 'save'])->name('save');
Route::get('crud/edit/{id}',[TestController::class, 'edit'])->name('edit.get');
Route::put('crud/edit/{id}',[TestController::class, 'editPut'])->name('edit.put');
Route::get('crud/delete/{id}',[TestController::class, 'delete'])->name('delete.get');
Route::get('crud/search',[TestController::class, 'searchDanhMuc'])->name('search');
Route::get('anh',function(){
    return view('test2');
})->name('test');


Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
