<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/record/{type}', function ($type) {
    return Inertia::render('Home/record',["type"=>$type]);
})->middleware(['guest']);

Route::get('/audio', function () {
    return Inertia::render('Home/audio');
})->middleware(['guest']);

Route::get('/video', function () {
    return Inertia::render('Home/video');
})->middleware(['guest']);

Route::get('/about', function () {
    return Inertia::render('Home/about');
});

Route::get('/contact', function () {
    return Inertia::render('Home/contact');
});

require __DIR__.'/auth.php';
