<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reg_login;

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

Route::get('/home', function () {
    if (session('email')) {
        return view('home');
    } else {
        return redirect('/login')->with('ses_error', 'Please login First');
    }
});
Route::view('register', 'register');
Route::view('login', 'login');
// Route::view('logout', 'logout');
Route::view('navbar', 'navbar');

Route::controller(reg_login::class)->group(function () {
    Route::post('reg_submit', 'register');
    Route::post('reg_login', 'login');
    Route::get('logout', 'logout');
    Route::get('home', 'showdata');
    Route::post('edit/update', 'update');
    Route::get('edit/{id}', 'edit');
    Route::get('delete/{id}', 'delete');
    // Route::post('reg_submit', 'register');

});
