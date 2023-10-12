<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [App\Http\Controllers\HomeController::class, "home"])->name("home");
Route::get("/{slug}", [App\Http\Controllers\HomeController::class, "getArtikel"])->name("artikel");

Route::prefix("_admin")->group(function(){
    Route::get("login", [LoginController::class, "showLoginForm"]);
    Route::post("login", [LoginController::class, "login"])->name('login');

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/artikel', [App\Http\Controllers\AdminController::class, 'getDataTableData'])->name('artikel.datatable');
    Route::put('/artikel', [App\Http\Controllers\AdminController::class, 'update'])->name('update');
    Route::post('/artikel', [App\Http\Controllers\AdminController::class, 'store'])->name('store');
    Route::post('/artikel/delete', [App\Http\Controllers\AdminController::class, 'destroy'])->name('destroy');
    Route::get('/artikel/get', [App\Http\Controllers\AdminController::class, 'show'])->name('show');

    Route::post('logout', [LoginController::class, "logout"])->name('logout');

});
