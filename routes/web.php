<?php

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\Auth\TikTokController;
use App\Http\Controllers\AdminController;

Route::get('/auth/discord', [DiscordController::class, 'redirectToDiscord']);
Route::get('/callback', [DiscordController::class, 'handleDiscordCallback']);

// TikTok authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/tiktok/login', [TikTokController::class, 'redirectToTikTok']);
    Route::get('/tiktok/callback', [TikTokController::class, 'handleTikTokCallback']);
});

// Route::middleware('guest')->group(function () {
//     Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
//     Route::post('/register', [RegisteredUserController::class, 'store']);
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route to access the admin login page
Route::get('/admin', function () {
    return view('admin'); // You can create a view that shows the login form if needed.
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// Route for the 'Homepage' page
Route::get('/', function () {
    return view('homepage'); // Refer to homepage.blade.php
});

// Route for the 'Nieuws' page
Route::get('/nieuws', function () {
    return view('news'); // Refer to news.blade.php
});

// Route for the 'Community' page
Route::get('/community', function () {
    return view('community'); // Refer to community.blade.php
});

// Route for the 'Missie & Visie' page
Route::get('/missie-visie', function () {
    return view('missie-visie'); // Refer to missie-visie.blade.php
});

// Route for the 'Over Ons' page
Route::get('/over-ons', function () {
    return view('about-us'); // Refer to team-and-origin.blade.php
});

// Route for the 'Kennis Maken' page
Route::get('/kennis-maken', function () {
    return view('kennis-maken'); // Refer to kennis-maken.blade.php
});

// Route for the 'Contact' page
Route::get('/contact', function () {
    return view('contact'); // Refer to contact.blade.php
});

// Route for the 'For Business' page
Route::get('/bedrijven', function () {
    return view('for-business'); // Refer to for-business.blade.php
});

// Route for the 'Privacy Policy' page
Route::get('/privacy-policy', function () {
    return view('privacy-policy'); // Refer to privacy-policy.blade.php
});

// Route for the 'Terms & Conditions' page
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions'); // Refer to terms-and-conditions.blade.php
});







Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    Route::post('/admin/refresh-token', [AdminController::class, 'refreshTikTokToken'])->name('admin.refresh-token');

    Route::post('/admin/update-followers', [AdminController::class, 'updateTikTokFollowers'])->name('admin.update-followers');
});

// Route for the 'Test' page
Route::get('/admin/test', function () {
    return view('test');
})->middleware('auth');

// Route for the 'HTML/CSS Footer for Payhip' page
Route::get('/admin/html-css-footer-for-payhip', function () {
    return view('html-css-footer-for-payhip');
})->middleware('auth');

// Route for the 'Empty' page
Route::get('/admin/empty', function () {
    return view('empty');
})->middleware('auth');






// Route for generating sitemap
Route::get('/generate-sitemap', function () {
    // Generate the sitemap manually
    $sitemap = Sitemap::create()
        ->add(Url::create('/')->setLastModificationDate(now())->setChangeFrequency('daily')->setPriority(1.0))
        ->add(Url::create('/about')->setLastModificationDate(now())->setChangeFrequency('weekly')->setPriority(0.8));
    
    // Write sitemap to public folder
    $sitemap->writeToFile(public_path('sitemap.xml'));
    
    return 'Sitemap has been generated!';
});

// Route for generating full sitemap using SitemapGenerator
Route::get('/generate-full-sitemap', function () {
    SitemapGenerator::create('https://thesystemoftheworld.com')
        ->writeToFile(public_path('sitemap.xml'));

    return 'Full sitemap has been generated!';
});