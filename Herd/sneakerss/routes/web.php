<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactPersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandController;

// Root route verwijst naar de Homepagina
Route::get('/', [HomeController::class, 'index'])->name('home');

// Homepagina route volgens user story
Route::get('/home', [HomeController::class, 'index']);

// Dashboard (from Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes (from Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Beheer routes (alleen voor medewerkers)
Route::middleware(['auth', 'medewerker'])->group(function () {
    // Contactpersonen
    Route::get('/contactpersonen', [ContactPersonController::class, 'index'])->name('contactpersonen');
    Route::post('/contactpersonen', [ContactPersonController::class, 'store'])->name('contactpersonen.store');
    Route::get('/contactpersonen/{contactpersoon}/edit', [ContactPersonControllerController::class, 'edit'])->name('contactpersonen.edit');
    Route::patch('/contactpersonen/{contactpersoon}', [ContactPersonController::class, 'update'])->name('contactpersonen.update');
    Route::delete('/contactpersonen/{contactpersoon}', [ContactPersonController::class, 'destroy'])->name('contactpersonen.destroy');
    
    // Standen beheer - Protected routes for employees only
    Route::post('/stands', [StandController::class, 'store'])->name('stands.store');
    Route::get('/stands/{stand}/edit', [StandController::class, 'edit'])->name('stands.edit');
    Route::patch('/stands/{stand}', [StandController::class, 'update'])->name('stands.update');
    Route::delete('/stands/{stand}', [StandController::class, 'destroy'])->name('stands.destroy');
});

// Standen routes
Route::get('/stand-huren', [StandController::class, 'publicIndex'])->name('stand_huren');
Route::get('/stands/create', [StandController::class, 'create'])->name('stands.create')->middleware(['auth', 'medewerker']);
Route::get('/stands/{stand}', [StandController::class, 'show'])->name('stands.show');

Route::get('/taken', function () {
    return response('<h1>Taken</h1><p>Placeholder pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('taken');

Route::get('/instellingen', function () {
    return response('<h1>Instellingen</h1><p>Placeholder pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('instellingen');

// Footer links placeholders
Route::get('/privacy', function () {
    return response('<h1>Privacy</h1><p>Placeholder pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('privacy');

Route::get('/voorwaarden', function () {
    return response('<h1>Voorwaarden</h1><p>Placeholder pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('terms');

// Top navigatie volgens wireframe
Route::get('/tickets', function () {
    return response('<h1>Tickets kopen</h1><p>Placeholder tickets pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('tickets');

Route::get('/events', function () {
    return response('<h1>Events</h1><p>Placeholder events pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('events');

Route::get('/shop', function () {
    return response('<h1>Shop</h1><p>Placeholder shop pagina</p>', 200)
        ->header('Content-Type', 'text/html; charset=utf-8');
})->name('shop');

// Contact formulier (GET toon, POST verstuur)
Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

require __DIR__.'/auth.php';
