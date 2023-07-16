<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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


/* Route::get('/register', [RegisterController::class, 'show']);
Route::post('/action-register', [RegisterController::class, 'register']); */

// EMAIL
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (\Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (\Illuminate\Http\Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('home.index');
    //ingreso en caso de ser admin
    
    Route::get('/homeadmin', 'HomeControlleradmin@index')->name('homeadmin.index');

    Route::resource('role', 'App\Http\Controllers\RoleController');
    Auth::routes();

    Route::resource('user', 'App\Http\Controllers\UserController');
    Route::resource('clirols', 'App\Http\Controllers\ClirolController');

    //definicion de rutas para el modulo de empleados

    Route::resource('periodos', 'App\Http\Controllers\PeriodoController');
    Route::resource('carreras', 'App\Http\Controllers\CarreraController');
    Route::resource('periodos', 'App\Http\Controllers\PeriodoController');
    Route::resource('empleadocarrera', 'App\Http\Controllers\EmpleadocarreraController');
    Route::resource('empleados', 'App\Http\Controllers\EmpleadoController');


    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');
        
        

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

       
    });
  
});
