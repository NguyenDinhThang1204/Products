<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
Route::resource('products', ProductController::class)->middleware('auth');
Route::get('/login', function () {
    return view('login');
});
//
Route::post('/login', function () {
    $credentials = request()->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect('products');
    }
    return redirect('/login')->withErrors([
        'email' => "There's no email"
    ]);
})->name('login');

