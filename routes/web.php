<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\VideoController as AdminVideoController;
use App\Http\Controllers\Admin\ClinicController as AdminClinicController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\HotlineController as AdminHotlineController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Route;

/**
 * Public Routes
 */
Route::get('/', function () {
    $feedbacks = Feedback::latest()->take(6)->get();
    return view('welcome', compact('feedbacks'));
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/faqs', function () {
    return view('faqs');
})->name('faqs');

Route::get('/search', [SearchController::class, 'index'])->name('search');

/**
 * Education Module
 */
Route::controller(EducationController::class)->prefix('education')->name('education.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/news', 'news')->name('news');
    Route::get('/info', 'info')->name('info');
    Route::get('/tips', 'tips')->name('tips');
    Route::get('/latching', 'latching')->name('latching');
    Route::get('/nutrition', 'nutrition')->name('nutrition');
    Route::get('/article/{slug}', 'showArticle')->name('article');
});

/**
 * Support Module
 */
Route::controller(SupportController::class)->prefix('support')->name('support.')->group(function () {
    Route::get('/clinics', 'clinics')->name('clinics');
    Route::get('/hotlines', 'hotlines')->name('hotlines');
});

/**
 * Authenticated Routes
 */
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProfileController::class)->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');
    });

    Route::controller(FeedbackController::class)->prefix('feedback')->name('feedback.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
});

/**
 * Admin Routes
 */
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    
    Route::resource('articles', AdminArticleController::class);
    Route::resource('videos', AdminVideoController::class);
    Route::resource('clinics', AdminClinicController::class);
    Route::resource('feedback', AdminFeedbackController::class)->only(['index', 'destroy']);
    Route::resource('faqs', AdminFaqController::class)->except(['create', 'edit', 'show']);
    Route::resource('hotlines', AdminHotlineController::class)->except(['create', 'edit', 'show']);
});

require __DIR__.'/auth.php';
