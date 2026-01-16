<?php

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\DiscordController;
use App\Http\Controllers\Auth\DiscordInstallController;
use App\Http\Controllers\Auth\TikTokController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\RateLimitedController;
use Illuminate\Http\Request;

View::share([
    'appVersion' => 'TSotW.3.2.17p',
]);

// . Deze route is beschermd door mijn aangepaste RateLimiterController maar ik heb momentele geen forms waar ik deze op kan toepassen maar heb het wel klaargezet voor toekomstig gebruik.
// De resource-methode 'store' pakt de POST-request op:
// Route::post('/verstuur-bericht', [RateLimitedController::class, 'store'])->name('bericht.verstuur');

Route::get('/auth/discord', [DiscordController::class, 'redirectToDiscord']);
Route::get('/callback', [DiscordController::class, 'handleDiscordCallback']);

Route::get('/discord/install', [DiscordInstallController::class, 'redirect'])
    ->name('discord.install');

Route::get('/discord/install/callback', [DiscordInstallController::class, 'callback'])
    ->name('discord.install.callback');

// TikTok authentication routes
Route::middleware('auth')->group(function () {
    Route::get('/tiktok/login', [TikTokController::class, 'redirectToTikTok']);
    Route::get('/tiktok/callback', [TikTokController::class, 'handleTikTokCallback']);
});

Route::get('/facebook/login', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])->name('facebook.callback');

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

// Redirect for signup form
Route::redirect('/intake', env('BREVO_FORM_LINK'), 301);

// Redirect for signup form
Route::redirect('/aanmelden', env('BREVO_FORM_LINK'), 301);

// Route for the 'Quinn' page
Route::get('/quinn', function () {
    return view('quinn'); // Refer to quinn.blade.php
});

// Route for the 'Resultaten' page
Route::get('/resultaten', function () {
    return view('results'); // Refer to results.blade.php
});

// Route for the 'Mentorschap' page
Route::get('/mentorschap', function () {
    return view('mentorship'); // Refer to mentorship.blade.php
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
// Route for the 'Bedankt voor jou aanmelding' page
Route::get('/bedankt-voor-jou-aanmelding', function (Request $request) {
    abort_unless($request->query('t') === 'brevo', 404);
    return view('thanks-for-signup');
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


Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::get('/facebook-token', function () {
        return view('admin.facebook-token', ['token' => session('token')]);
    })->name('facebook.token.show');

    Route::get('/dashboard', [AdminController::class, 'showDashboard'])
        ->name('admin.dashboard');

    Route::post('/refresh-tiktok-token', [AdminController::class, 'refreshTikTokToken'])
        ->name('admin.refresh-tiktok-token');

    Route::post('/refresh-meta-token', [AdminController::class, 'refreshMetaToken'])
        ->name('admin.refresh-meta-token');

    Route::post('/update-followers', [AdminController::class, 'updateTikTokFollowers'])
        ->name('admin.update-followers');

    Route::post('/update-youtube-followers', [AdminController::class, 'updateYoutubeFollowers'])
        ->name('admin.update-youtube-followers');

    Route::post('/update-meta-followers', [AdminController::class, 'updateMetaFollowers'])
        ->name('admin.update-meta-followers');

    Route::post('/update-discord-followers', [AdminController::class, 'updateDiscordFollowers'])
        ->name('admin.update-discord-followers');

    Route::post('/generate-discord-invite', [AdminController::class, 'generateDiscordInvite'])
        ->name('admin.generate-discord-invite');

    Route::get('/force-apis', function () {
        return view('admin.server-force-api');
    });

    Route::get('/test', function () {
        return view('admin.test');
    });

    Route::get('/inzichten', [\App\Http\Controllers\InsightController::class, 'index'])->name('admin.inzichten');

    Route::get('/inzichten/preview/{slug}', function ($slug) {
        $path = resource_path("insights/{$slug}.php");

        if (! file_exists($path)) {
            abort(404, 'Insight preview file not found');
        }

        $data = require $path;

        return view('admin.insights.index', [
            'insight' => (object) [
                'slug' => $data['slug'],
                'title' => $data['title'],
                'published' => $data['published'] ?? false,
                'content' => $data['content'],
            ],
        ]);
    })->middleware('auth');

    Route::get('/new-coaching', function () {
        return view('new-coaching');
    });

    Route::get('/html-css-footer-for-payhip', function () {
        return view('admin.html-css-footer-for-payhip');
    });

    Route::get('/empty', function () {
        return view('admin.empty');
    });
});

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