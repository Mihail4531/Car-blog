<?php

use App\Http\Controllers\Articles\ArticlesController;
use App\Http\Controllers\CategoryArticle\CategoryController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\Servise\ServiseController;
use Illuminate\Support\Facades\Route;

Route::namespace('Articles')->name('articles.')->group(function(){
    Route::get('/articles', [ArticlesController::class, 'index'])->name('index');
    Route::get('/articles/{id}/show', [ArticlesController::class, 'show'])->name('show');
});
Route::namespace('Categories')->name('categories.')->group(function(){
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/{is}/show-articles', [ArticlesController::class, 'showArticles'])->name('show-articles');
});

Route::namespace('Contact')->name('contact.')->group(function() {
    Route::get('/contact', [ContactController::class, 'index'])->name('index');
});

Route::namespace('Servise')->name('service.')->group(function(){
    Route::get('/service', [ServiseController::class, 'index'])->name('index');
    Route::get('/service/{id}/show', [ServiseController::class, 'show'])->name('show');
});
