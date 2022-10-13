<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //cruds
    Route::group(['prefix' => 'category'],function () {
        Route::get('/', App\Http\livewire\dashboard\category\Index::class,'index')->name("d-category-index"); //listado
        Route::get('/create', App\Http\livewire\dashboard\category\Save::class,'index')->name("d-category-create");; //crear
        Route::get('/edit/{id}', App\Http\livewire\dashboard\category\Save::class,'index')->name("d-category-edit");;//editar

    });
});
