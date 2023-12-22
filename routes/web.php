<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('contactus', function () {
    return view('contactus');
});

Route::prefix('blog')->group( function () {

    Route::get('/', function () {
        return view('blog');
    });

    Route::get('science', function () {
        return view('science');
    });

    Route::get('sports', function () {
        return view('sports');
    });

    Route::get('math', function () {
        return view('math');
    });

    Route::get('medical', function () {
        return view('medical');
    });
});

//session3
Route::post('logged',[Logincontroller::class,'logged'])->name('logged');
Route::get('login',[Logincontroller::class,'login']);