<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/register', function () {
    return redirect()->route('login');
});
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::get('export/excel', [UserController::class, 'exportExcel'])->name('users.export.excel');
Route::get('export/pdf', [UserController::class, 'exportPDF'])->name('users.export.pdf');
Route::post('store',[UserController::class,'store'])->name('store');
Route::get('users/{user}/change-password', [UserController::class, 'showChangePasswordForm'])->name('users.change-password');
Route::post('users/{user}/change-password', [UserController::class, 'changePassword'])->name('users.update-password');


