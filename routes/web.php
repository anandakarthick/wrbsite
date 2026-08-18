<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Profile Page
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Success Stories / Case Studies
Route::get('/success-stories', function () {
    return view('success-stories');
})->name('success-stories');

// Individual Case Study Pages
Route::get('/success-stories/healthcare-ai-platform', function () {
    return view('case-studies.healthcare-ai');
})->name('case-study.healthcare');

Route::get('/success-stories/smart-ecommerce', function () {
    return view('case-studies.smart-ecommerce');
})->name('case-study.ecommerce');

Route::get('/success-stories/enterprise-hrms', function () {
    return view('case-studies.enterprise-hrms');
})->name('case-study.hrms');

Route::get('/success-stories/intelligent-crm', function () {
    return view('case-studies.intelligent-crm');
})->name('case-study.crm');

Route::get('/success-stories/fintech-mobile-app', function () {
    return view('case-studies.fintech-app');
})->name('case-study.fintech');

Route::get('/success-stories/manufacturing-iot', function () {
    return view('case-studies.manufacturing-iot');
})->name('case-study.manufacturing');

// Services
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('service.show');

// Products
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('product.show');

// Contact Form Submission (throttled: max 5 submissions per minute per IP)
Route::post('/contact', [ContactController::class, 'submit'])
    ->middleware('throttle:5,1')
    ->name('contact.submit');

// Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
