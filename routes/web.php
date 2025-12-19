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
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\RateLimitedController;
use Illuminate\Http\Request;

View::share([
    'appVersion' => 'TSotW.3.1.14p',
]);

// . Deze route is beschermd door mijn aangepaste RateLimiterController maar ik heb momentele geen forms waar ik deze op kan toepassen maar heb het wel klaargezet voor toekomstig gebruik.
// De resource-methode 'store' pakt de POST-request op:
// Route::post('/verstuur-bericht', [RateLimitedController::class, 'store'])->name('bericht.verstuur');

Route::get('/auth/discord', [DiscordController::class, 'redirectToDiscord']);
Route::get('/callback', [DiscordController::class, 'handleDiscordCallback']);

// TikTok authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/tiktok/login', [TikTokController::class, 'redirectToTikTok']);
    Route::get('/tiktok/callback', [TikTokController::class, 'handleTikTokCallback']);
});

Route::get('/facebook/login', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name('facebook.callback');

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
    return view('admin.admin'); // You can create a view that shows the login form if needed.
})->middleware('throttle:5,1');

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

// Redirect for intake form
Route::redirect('/intake', env('BREVO_FORM_LINK'), 301);

// // Route for the 'Nieuws' page
// Route::get('/nieuws', function () {
//     return view('news'); // Refer to news.blade.php
// });

// Route for the 'Quinn' page
Route::get('/quinn', function () {
    return view('quinn'); // Refer to quinn.blade.php
});

// Route for the 'Resultaten' page
Route::get('/resultaten', function () {
    return view('results'); // Refer to results.blade.php
});

// Route for the 'Community' page
Route::get('/community', function () {
    return view('community'); // Refer to community.blade.php
});

// // Route for the 'Missie & Visie' page
// Route::get('/missie-visie', function () {
//     return view('missie-visie'); // Refer to missie-visie.blade.php
// });

// // Route for the 'Over Ons' page
// Route::get('/over-ons', function () {
//     return view('about-us'); // Refer to team-and-origin.blade.php
// });

// Route for the 'Coaching' page
Route::get('/coaching', function () {
    return view('coaching'); // Refer to coaching.blade.php
});

// Route for the 'Blueprint' page
Route::get('/blueprint', function () {
    return view('blueprint'); // Refer to blueprint.blade.php
});

// Route for the 'Contact' page
Route::get('/contact', function () {
    return view('contact'); // Refer to contact.blade.php
});
// Route for the 'Bedankt voor je bericht' page
Route::get('/bedankt-voor-je-bericht', function () {
    return view('thanks-for-contacting'); // Refer to thanks-for-contacting.blade.php
});

// // Route for the 'For Business' page
// Route::get('/bedrijven', function () {
//     return view('for-business'); // Refer to for-business.blade.php
// });

// Route for the 'Privacy Policy' page
Route::get('/privacy-policy', function () {
    return view('privacy-policy'); // Refer to privacy-policy.blade.php
});

// Route for the 'Terms & Conditions' page
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions'); // Refer to terms-and-conditions.blade.php
});


Route::get('/admin/facebook-token', function () {
    return view('admin.facebook-token', ['token' => session('token')]);
})->name('facebook.token.show')->middleware('auth');

// Route::get('/dashboard', function () {
//     return view('admin');
// })->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    Route::post('/admin/refresh-tiktok-token', [AdminController::class, 'refreshTikTokToken'])->name('admin.refresh-tiktok-token');
    Route::post('/admin/refresh-meta-token', [AdminController::class, 'refreshMetaToken'])->name('admin.refresh-meta-token');

    Route::post('/admin/update-followers', [AdminController::class, 'updateTikTokFollowers'])->name('admin.update-followers');
    Route::post('/admin/update-youtube-followers', [AdminController::class, 'updateYoutubeFollowers'])->name('admin.update-youtube-followers');    
    Route::post('/admin/update-meta-followers', [AdminController::class, 'updateMetaFollowers'])->name('admin.update-meta-followers');
    Route::post('/admin/update-discord-followers', [AdminController::class, 'updateDiscordFollowers'])->name('admin.update-discord-followers');
    Route::post('/admin/generate-discord-invite', [AdminController::class, 'generateDiscordInvite'])->name('admin.generate-discord-invite');
});

// Route for the 'Force API's' page
Route::get('/admin/force-apis', function () {
    return view('admin.server-force-api');
})->middleware('auth');

// Route for the 'Test' page
Route::get('/admin/test', function () {
    return view('admin.test');
})->middleware('auth');

// Route for the 'Test' page
Route::get('/admin/new-coaching', function () {
    return view('new-coaching');
})->middleware('auth');


// Route for the 'HTML/CSS Footer for Payhip' page
Route::get('/admin/html-css-footer-for-payhip', function () {
    return view('admin.html-css-footer-for-payhip');
})->middleware('auth');

// Route for the 'Empty' page
Route::get('/admin/empty', function () {
    return view('admin.empty');
})->middleware('auth');


Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'De ingevoerde gegevens zijn onjuist.',
    ])->onlyInput('email');
})->middleware('throttle:5,1')->name('login');




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