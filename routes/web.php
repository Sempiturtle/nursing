<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Education Module
Route::group(['prefix' => 'education', 'as' => 'education.'], function () {
    Route::get('/', [\App\Http\Controllers\EducationController::class, 'index'])->name('index');
    Route::get('/news', [\App\Http\Controllers\EducationController::class, 'news'])->name('news');
    Route::get('/info', [\App\Http\Controllers\EducationController::class, 'info'])->name('info');
    Route::get('/tips', [\App\Http\Controllers\EducationController::class, 'tips'])->name('tips');
    Route::get('/latching', [\App\Http\Controllers\EducationController::class, 'latching'])->name('latching');
    Route::get('/nutrition', [\App\Http\Controllers\EducationController::class, 'nutrition'])->name('nutrition');
    Route::get('/article/{slug}', [\App\Http\Controllers\EducationController::class, 'showArticle'])->name('article');
});

// Support Module
Route::prefix('support')->group(function () {
    Route::get('/clinics', [\App\Http\Controllers\SupportController::class, 'clinics'])->name('support.clinics');
    Route::get('/hotlines', [\App\Http\Controllers\SupportController::class, 'hotlines'])->name('support.hotlines');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [\App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/feedback', [\App\Http\Controllers\FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback', [\App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class);
    Route::resource('videos', \App\Http\Controllers\Admin\VideoController::class);
    Route::resource('clinics', \App\Http\Controllers\Admin\ClinicController::class);
    Route::get('/users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
    Route::resource('feedback', \App\Http\Controllers\Admin\FeedbackController::class)->only(['index', 'destroy']);
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class)->except(['create', 'edit', 'show']);
    Route::resource('hotlines', \App\Http\Controllers\Admin\HotlineController::class)->except(['create', 'edit', 'show']);
});

require __DIR__.'/auth.php';
