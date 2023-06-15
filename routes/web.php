<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;

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
    return view('acceuil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->group(function () {
       Route::resource('/GestionPublication' , 'App\Http\Controllers\PublicationController' );
       Route::resource('/GestionGenreMusicaux' , 'App\Http\Controllers\GenreMusicauxController' );

});

require __DIR__.'/auth.php';
