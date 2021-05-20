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


/*Route::get('/', function () {
    return view('auth.register');
});
*/




Route::get('/', function () {
   // return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('form.account');

Route::get('/member', [App\Http\Controllers\HomeController::class, 'member'])->name('form.member');

Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('form.user');


/*Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/

//Google Login
//Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
//Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Auth::routes();

//Google Login
Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

//Facebook Login
Route::get('/login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);


/*
Route::group(['middleware' => 'auth'], function(){
Route::get('/', [HomeController::class, 'account'])->name('account');

});
*/

//Route::get('/account', 'form@account');

//Route::get('/account', [App\Http\Controllers\HomeController::class, 'account'])->name('form.account');

Route::get('/yo', function()
{
    return 'Hello World';
});
