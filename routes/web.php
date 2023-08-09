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

Route::get('/pzn', function(){
    return "Programmer Zaman Now";
});

// route view
Route::view('/hello', 'hello', ['name' => 'Rangga']);
Route::get('/hello-again', function() {
    return view('hello', ['name' => 'Rangga']);
});;
