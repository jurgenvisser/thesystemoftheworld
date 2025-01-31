<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

// // Route::get('/homepage', function () {
// //     return view('homepage');
// // })->name('homepage');

// // Route::get('/index', function () {
// //     return view('homepage');
// // });

// Route for the 'Homepage' page
Route::get('/', function () {
    return view('homepage'); // Refer to homepage.blade.php
});

// Route for the 'Social Media' page
Route::get('/social-media', function () {
    return view('social-media'); // Refer to social-media.blade.php
});

// Route for the 'Missie & Visie' page
Route::get('/missie-visie', function () {
    return view('missie-visie'); // Refer to missie-visie.blade.php
});

// Route for the 'Merchandise' page
Route::get('/merchandise', function () {
    return view('merchandise'); // Refer to merchandise.blade.php
});

// Route for the 'Missie & Visie' page
Route::get('/contact', function () {
    return view('contact'); // Refer to missie-visie.blade.php
});

// Route for the 'Missie & Visie' page
Route::get('/test', function () {
    return view('test'); // Refer to missie-visie.blade.php
});

// Route for the 'Toekomst' page
Route::get('/toekomst', function () {
    return view('toekomst'); // Refer to toekomst.blade.php
});

// Route for the 'Brand' page
Route::get('/brand', function () {
    return view('brand'); // Refer to brand.blade.php
});

// This the route for the coming-soon page
Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon'); // Refer to coming-soon.blade.php

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