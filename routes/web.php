<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
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
})->name('product.detail');

// Route Parameter double
Route::get('/products/{product}/items/{item}', function($productId, $itemId) {
    return "Product : " . $productId . ", Item : " . $itemId;
})->name('product.item.detail');

Route::get('/categories/{id}', function($categoryId) {
    return "Category $categoryId";
})->name('category.detail');

Route::get('/users/{id?}', function(string $userId = '404') {
    return "Users $userId";
})->name('user.detail');

// keuntungan menggunakan named route adalah ketika kita membutuhkan informasi dari route tersebut, cukup sebutkan nama routenya

// Routing conflict itu akan diprioritaskan yang bagian atasnya
Route::get('/conflict/{name}', function($name) {
    return 'Conflict '. $name;
});

Route::get('/conflict/eko', function() {
    return 'Conflict Eko Khannedy';
});

// Contoh penggunaan untuk named route
Route::get('/produk/{id}', function($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link : $link";
});

Route::get('/produk-redirect/{id}', function($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

Route::get('/controller/hello/request', 'HelloController@request');

Route::get('/controller/hello/{name}', 'HelloController@hello');

// request input
Route::get('/input/hello', 'InputController@hello');

Route::post('/input/hello', 'InputController@hello');

Route::get('/input/hello/first', 'InputController@helloFirstName');

Route::post('/input/hello/input', 'InputController@helloInput');

Route::post('/input/hello/array', 'InputController@arrayInput');

Route::post('/input/filter/merge', 'InputController@filterMerge');

Route::post('/file/upload', 'FileController@upload');

// response
Route::get('/response/hello', [ResponseController::class, 'response']);

Route::get('/response/header', [ResponseController::class, 'header']);
Route::get('/response/json', [ResponseController::class, 'responseJson']);

Route::get('/response/view', [ResponseController::class, 'responseView']);
Route::get('/response/type/file', [ResponseController::class, 'responseFile']);
Route::get('/response/type/download', [ResponseController::class, 'responseDownload']);

// Cookie
Route::get('/cookie/set', [CookieController::class, 'createCookie']);
Route::get('/cookie/get', [CookieController::class, 'getCookie']);
Route::get('/cookie/clear', [CookieController::class, 'clearCookie']);

// redirect
Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);
Route::get('/redirect/to', [RedirectController::class,'redirectTo']);
