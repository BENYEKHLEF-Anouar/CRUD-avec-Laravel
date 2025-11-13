<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;

// Route test
Route::get('/ping', fn() => 'pong');

// Routes nommées avec contrôleur
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');

// Mini-routes articles (mockées pour l’instant)
Route::get('/articles', [PageController::class, 'articles'])->name('articles.index');

Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles',        [ArticleController::class, 'store'])->name('articles.store');

Route::get('/articles/{slug}', [PageController::class, 'show'])->name('articles.show');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');


//  http://localhost:8000/ping
