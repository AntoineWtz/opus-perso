<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\TypePublicationController;
use App\Http\Controllers\MotifContactController;
use App\Http\Controllers\GalerieController;
use App\Http\Controllers\GenreMusicauxController;
use App\Http\Controllers\InfoAffichageController;
use App\Http\Controllers\LieuxController;
use App\Http\Controllers\PageStatiqueController;
use App\Http\Controllers\ParametrageRSController;
use App\Http\Controllers\TypeEvenementController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [AccueilController::class, 'index'])->name('accueil');

Route::get('/agenda', function () {
    return view('agenda');
});

Route::get('/publication', function () {
    return view('publication');
});

Route::get('/publications', function () {
    return view('publications');
});

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact.showContactForm');
Route::post('/contact', [ContactController::class, 'submitContactForm'])->name('contact.submitContactForm');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard', DashboardController::class)->except(['index']);
    
    // Autres routes protégées par le middleware d'authentification
    Route::prefix('/admin')->group(function () {
        Route::resource('/GestionArtiste', ArtisteController::class);

        Route::resource('/GestionEvenement', EvenementController::class);

        Route::resource('/GestionGalerie', GalerieController::class);

        Route::resource('/GestionGenreMusicaux', GenreMusicauxController::class);

        Route::resource('/GestionInfoAffichage', InfoAffichageController::class);

        Route::resource('/GestionLieux', LieuxController::class);

        Route::resource('/GestionMedia', MediaController::class);

        Route::resource('/GestionMotifContact', MotifContactController::class);

        Route::resource('/GestionPageStatique', PageStatiqueController::class);

        Route::resource('/GestionParametrageRS', ParametrageRSController::class);

        Route::resource('/GestionPublication', PublicationController::class);

        Route::resource('/GestionTypeEvenement', TypeEvenementController::class);

        Route::resource('/GestionTypeMedia', TypeMediaController::class);

        Route::resource('/GestionTypePublication', TypePublicationController::class);

        Route::resource('/GestionUser' , UserController::class);
    });
});

require __DIR__ . '/auth.php';
