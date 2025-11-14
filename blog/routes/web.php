<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;



Route::get('/', fn() => redirect()->route('articles.index'));
Route::resource('articles', ArticleController::class)->except(['show']);

// Routes nommées avec contrôleur
// Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('/a-propos', [PageController::class, 'about'])->name('about');

// Mini-routes articles (mockées pour l’instant)
// Route::get('/articles', [PageController::class, 'articles'])->name('articles.index');

// Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create'); // Shows form
// Route::post('/articles',        [ArticleController::class, 'store'])->name('articles.store'); // Save new article (form submission)

// Route::get('/articles/{slug}', [PageController::class, 'show'])->name('articles.show');

// Route::get('/contact', [PageController::class, 'contact'])->name('contact');


//  http://localhost:8000/ping



// -----------------------

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PageController;
// use App\Http\Controllers\ArticleController;

// // Home
// Route::get('/', [PageController::class, 'home'])->name('home');

// // Static pages
// Route::get('/a-propos', [PageController::class, 'about'])->name('about');
// Route::get('/contact',  [PageController::class, 'contact'])->name('contact');

// // Articles
// Route::resource('articles', ArticleController::class)->parameters([
//     'articles' => 'slug'
// ]);
