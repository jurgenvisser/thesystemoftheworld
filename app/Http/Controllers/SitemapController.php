<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        // Array to store URLs
        $urls = [];

        // Add static public pages to the sitemap
        $urls[] = [
            'loc' => URL::to('/'),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'daily',
            'priority' => '1.0',
        ];

        $urls[] = [
            'loc' => URL::to('/social-media'),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'weekly',
            'priority' => '0.9',
        ];

        $urls[] = [
            'loc' => 'https://shop.thesystemoftheworld.com',
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.8'
        ];

        $urls[] = [
            'loc' => URL::to('/missie-visie'),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => URL::to('/contact'),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'monthly',
            'priority' => '0.8',
        ];

        $urls[] = [
            'loc' => URL::to('/privacy'),
            'lastmod' => Carbon::now()->toAtomString(),
            'changefreq' => 'yearly',
            'priority' => '0.5',
        ];

        // // Add dynamic pages if applicable
        // $posts = \App\Models\Post::all(); // Replace with your actual model if needed
        // foreach ($posts as $post) {
        //     $urls[] = [
        //         'loc' => URL::to('/posts/' . $post->slug),
        //         'lastmod' => $post->updated_at->toAtomString(),
        //         'changefreq' => 'weekly',
        //         'priority' => '0.9',
        //     ];
        // }

        // Generate XML for the sitemap
        $xml = $this->generateSitemap($urls);

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    private function generateSitemap($urls)
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($urls as $url) {
            $urlTag = $xml->addChild('url');
            $urlTag->addChild('loc', htmlspecialchars($url['loc'], ENT_QUOTES, 'UTF-8'));
            $urlTag->addChild('lastmod', $url['lastmod']);
            $urlTag->addChild('changefreq', $url['changefreq']);
            $urlTag->addChild('priority', $url['priority']);
        }

        return $xml->asXML();
    }
}