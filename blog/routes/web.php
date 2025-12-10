<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;

// --- Public Routes ---
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/a-propos', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

// Public Article Read Access
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show'); // Using model binding 'article' (slug)

// Authentication Routes
Auth::routes();

// --- Authenticated Routes (Common) ---
Route::middleware(['auth'])->group(function () {

    // Default Redirect / Dashboard Main Entry
    Route::get('/home', [HomeController::class, 'index'])->name('dashboard_home');

    // Article Management (Create, Store, Edit, Update, Destroy)
    // Note: 'index' and 'show' are public, so we exclude them here.
    // Policies (AuthServiceProvider) determine if User can actually perform these actions.
    Route::resource('articles', ArticleController::class)->except(['index', 'show']);

    // --- Author Specific ---
    Route::prefix('author')->name('author.')->group(function () {
        Route::get('/dashboard', [HomeController::class, 'authorIndex'])->name('dashboard');
    });

});

// --- Admin Only Routes ---
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard at /admin
    Route::get('/', [HomeController::class, 'adminIndex'])->name('dashboard');

    // Future: User Management, etc.
    // Route::resource('users', UserController::class);

});
