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
        Route::delete('/GestionArtiste/{id}', [ArtisteController::class, 'destroy'])->name('artiste.destroy');

        Route::resource('/GestionEvenement', EvenementController::class);
        Route::delete('/GestionEvenement/{id}', [EvenementController::class, 'destroy'])->name('evenement.destroy');

        Route::resource('/GestionGalerie', GalerieController::class);
        Route::delete('/GestionGalerie/{id}', [GalerieController::class, 'destroy'])->name('galerie.destroy');

        Route::resource('/GestionGenreMusicaux', GenreMusicauxController::class);
        Route::delete('/GestionGenreMusicaux/{id}', [GenreMusicauxController::class, 'destroy'])->name('genreMusicaux.destroy');

        Route::resource('/GestionInfoAffichage', InfoAffichageController::class);
        Route::delete('/GestionInfoAffichage/{id}', [InfoAffichageController::class, 'destroy'])->name('infoAffichage.destroy');

        Route::resource('/GestionLieux', LieuxController::class);
        Route::delete('/GestionLieux/{id}', [LieuxController::class, 'destroy'])->name('lieux.destroy');

        Route::resource('/GestionMedia', MediaController::class);
        Route::delete('/GestionMedia/{id}', [MediaController::class, 'destroy'])->name('media.destroy');

        Route::resource('/GestionMotifContact', MotifContactController::class);
        Route::delete('/GestionMotifContact/{id}', [MotifContactController::class, 'destroy'])->name('motifContact.destroy');

        Route::resource('/GestionPageStatique', PageStatiqueController::class);
        Route::delete('/GestionPageStatique/{id}', [PageStatiqueController::class, 'destroy'])->name('pageStatique.destroy');

        Route::resource('/GestionParametrageRS', ParametrageRSController::class);
        Route::delete('/GestionParametrageRS/{id}', [ParametrageRSController::class, 'destroy'])->name('parametrageRS.destroy');

        Route::resource('/GestionPublication', PublicationController::class);
        Route::delete('/GestionPublication/{id}', [PublicationController::class, 'destroy'])->name('publication.destroy');

        Route::resource('/GestionTypeEvenement', TypeEvenementController::class);
        Route::delete('/GestionTypeEvenement/{id}', [TypeEvenementController::class, 'destroy'])->name('typeEvenement.destroy');

        Route::resource('/GestionTypeMedia', TypeMediaController::class);
        Route::delete('/GestionTypeMedia/{id}', [TypeMediaController::class, 'destroy'])->name('typeMedia.destroy');

        Route::resource('/GestionTypePublication', TypePublicationController::class);
        Route::delete('/GestionTypePublication/{id}', [TypePublicationController::class, 'destroy'])->name('typePublication.destroy');

        Route::resource('/GestionUser' , UserController::class);
        Route::delete('/GestionUser/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});

require __DIR__ . '/auth.php';
