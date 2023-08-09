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

Route::fallback(function(){ // fallback = 404
    return "Halaman tidak ditemukan";
});

// route view
Route::view('/hello', 'hello', ['name' => 'Rangga']);
Route::get('/hello-again', function() {
    return view('hello', ['name' => 'Rangga']);
});;

// Route Parameter
Route::get('/products/{id}', function($productId) {
    return "Product : " . $productId;
});

// Route Parameter double
Route::get('/products/{product}/items/{item}', function($productId, $itemId) {
    return "Product : " . $productId . ", Item : " . $itemId;
});

Route::get('/users/{id?}', function(string $userId = '404') {
    return "Users $userId";
});

// Routing conflict itu akan diprioritaskan yang bagian atasnya
Route::get('/conflict/{name}', function($name) {
    return 'Conflict '. $name;
});

Route::get('/conflict/eko', function() {
    return 'Conflict Eko Khannedy';
});
