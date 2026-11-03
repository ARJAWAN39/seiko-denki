<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ChatbotController;

// Public Marketing & Corporate Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about-us', [PageController::class, 'about'])->name('about');
Route::get('/about', fn() => redirect('/about-us'));
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/achievements', [PageController::class, 'achievements'])->name('achievements');
Route::get('/news-events', [PageController::class, 'news'])->name('news');
Route::get('/news', fn() => redirect('/news-events'));
Route::get('/facilities', [PageController::class, 'facilities'])->name('facilities');
Route::get('/contact-us', [PageController::class, 'contact'])->name('contact');
Route::get('/contact', fn() => redirect('/contact-us'));

// Executive Traffic & Analytics Report Route (Feature 2 in Document)
Route::get('/executive-report', [PageController::class, 'analytics'])->name('analytics');
Route::get('/analytics', fn() => redirect('/executive-report'));

// WhatsApp Qualifying Live Chat API (Feature 1 in Document)
Route::post('/api/chat-lead', [ChatbotController::class, 'handleLead'])->name('chat.lead');
