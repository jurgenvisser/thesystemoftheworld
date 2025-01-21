<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

//!! This is only temporary, this should not exist when the rest of the website is done
//. This is curently in place so that the website is not visible to the public
Route::get('/', function () {
    return redirect('/coming-soon');
}); 

//. This should be the normal route for the website once the rest is done
//* change /index to / to make it the main page
Route::get('/index', function () {
    return view('homepage');
})->name('index');

// This the route for the coming-soon page
Route::get('/coming-soon', function () {
    return view('coming-soon');
})->name('coming-soon');

// Route for the 'Brand' page
Route::get('/brand', function () {
    return view('brand'); // Refer to brand.blade.php
});

// Route for the 'Social Media' page
Route::get('/social-media', function () {
    return view('social-media'); // Refer to social-media.blade.php
});

// Route for the 'Visie' page
Route::get('/visie', function () {
    return view('visie'); // Refer to visie.blade.php
});

// Route for the 'Toekomst' page
Route::get('/toekomst', function () {
    return view('toekomst'); // Refer to toekomst.blade.php
});

// Route for the 'Merchandise' page
Route::get('/merchandise', function () {
    return view('merchandise'); // Refer to merchandise.blade.php
});

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