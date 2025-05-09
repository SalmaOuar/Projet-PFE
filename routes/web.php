<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SujetController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EncadrantController;
use App\Http\Controllers\Admin\AffectationController;
use App\Http\Controllers\EvaluationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login/admin', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/login/encadrant', function () {
    return redirect()->route('encadrant.dashboard');
});

Route::get('/login/etudiant', function () {
    return redirect()->route('etudiant.dashboard');
});


/*Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');*/

Route::get('/encadrant/dashboard', function () {
    return view('encadrant.dashboard');
})->name('encadrant.dashboard');

/*Route::get('/etudiant/dashboard', function () {
    return view('etudiant.dashboard');
})->name('etudiant.dashboard');*/

// Pages de connexion
Route::get('/login/admin', function () {
    return view('login_admin');
})->name('login.admin.view');

Route::get('/login/encadrant', function () {
    return view('login_encadrant');
})->name('login.encadrant.view');

Route::get('/login/etudiant', function () {
    return view('login_etudiant');
})->name('login.etudiant.view');

// Traitement des connexions
Route::post('/login/admin', [App\Http\Controllers\AuthController::class, 'loginAdmin'])->name('login.admin');
Route::post('/login/encadrant', [App\Http\Controllers\AuthController::class, 'loginEncadrant'])->name('login.encadrant');
Route::post('/login/etudiant', [App\Http\Controllers\AuthController::class, 'loginEtudiant'])->name('login.etudiant');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('sujets', SujetController::class);
});
Route::resource('users', App\Http\Controllers\Admin\UserController::class);
Route::resource('sujets', App\Http\Controllers\Admin\SujetController::class);
Route::resource('affectations', App\Http\Controllers\Admin\AffectationController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('sujets', SujetController::class);
});

Route::middleware(['auth'])->prefix('etudiant')->name('etudiant.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\EtudiantController::class, 'dashboard'])->name('dashboard');
    Route::get('/sujet', [App\Http\Controllers\EtudiantController::class, 'formSujet'])->name('sujet.form');
    Route::post('/sujet', [App\Http\Controllers\EtudiantController::class, 'soumettreSujet'])->name('sujet.soumettre');

});

Route::middleware(['auth'])->prefix('etudiant')->name('etudiant.')->group(function () {
    Route::get('/dashboard', [EtudiantController::class, 'dashboard'])->name('dashboard');
});

Route::get('/dashboard', [EtudiantController::class, 'dashboard'])->name('dashboard');

Route::middleware(['auth'])->prefix('etudiant')->name('etudiant.')->group(function () {
    Route::get('/etat', [App\Http\Controllers\EtudiantController::class, 'etatProjet'])->name('etat');
});

Route::middleware(['auth'])->prefix('etudiant')->name('etudiant.')->group(function () {
    Route::get('/rapport', [EtudiantController::class, 'formUploadRapport'])->name('rapport.form');
    Route::post('/rapport', [EtudiantController::class, 'uploadRapport'])->name('rapport.upload');
});

Route::post('/admin/sujets/{id}/valider', [SujetController::class, 'valider'])->name('admin.sujets.valider');
Route::post('/admin/sujets/{id}/refuser', [SujetController::class, 'refuser'])->name('admin.sujets.refuser');
Route::get('/admin/sujets/{id}/affecter', [SujetController::class, 'formAffecter'])->name('admin.affecter.form');

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth')->name('welcome');

Route::middleware(['auth'])->prefix('etudiant')->name('etudiant.')->group(function () {
    Route::get('/rapport', [EtudiantController::class, 'showUploadForm'])->name('rapport.upload');
    Route::post('/rapport', [EtudiantController::class, 'uploadRapport'])->name('rapport.store');
});

Route::get('/encadrant/dashboard', [EncadrantController::class, 'dashboard'])->name('encadrant.dashboard');

Route::get('/admin/affectations', [AffectationController::class, 'index'])->name('admin.affectations.index');

Route::post('/admin/affectations', [AffectationController::class, 'store'])->name('admin.affectations.store');

Route::prefix('encadrant')->middleware(['auth'])->group(function () {
    Route::get('/evaluation/{sujet}', [EvaluationController::class, 'form'])->name('encadrant.evaluation.form');
    Route::post('/evaluation/{sujet}', [EvaluationController::class, 'store'])->name('encadrant.evaluation.store');
});

Route::post('/toggle-darkmode', function () {
    session(['dark_mode' => !session('dark_mode', false)]);
    return back();
})->name('toggle.darkmode');


