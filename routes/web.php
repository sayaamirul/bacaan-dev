<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\HomePage::class)->name('home-page');

Route::get('articles', \App\Livewire\Article\ListArticle::class)->name('article.list');
Route::get('articles/{article:slug}', \App\Livewire\Article\SingleArticle::class)->name('article.single');

Route::get('snippets', \App\Livewire\Snippet\ListSnippet::class)->name('snippet.list');
Route::get('snippets/{snippet:slug}', \App\Livewire\Snippet\SingleSnippet::class)->name('snippet.single');

Route::get('topics', \App\Livewire\Topic\ListTopic::class)->name('topic.list');
Route::get('topics/{topic:slug}', \App\Livewire\Topic\SingleTopic::class)->name('topic.single');

Route::get('series', \App\Livewire\Series\ListSeries::class)->name('series.list');
Route::get('series/{series:slug}', \App\Livewire\Series\SingleSeries::class)->name('series.single');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';
