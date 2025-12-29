<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate XML Sitemap
     */
    public function index()
    {
        $pages = [
            [
                'url' => url('/'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'daily',
                'priority' => '1.0'
            ],
            [
                'url' => url('/profile'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => url('/success-stories'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'weekly',
                'priority' => '0.9'
            ],
            [
                'url' => url('/success-stories/healthcare-ai-platform'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => url('/success-stories/smart-ecommerce'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => url('/success-stories/enterprise-hrms'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => url('/success-stories/intelligent-crm'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => url('/success-stories/fintech-mobile-app'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
            [
                'url' => url('/success-stories/manufacturing-iot'),
                'lastmod' => '2024-12-28',
                'changefreq' => 'monthly',
                'priority' => '0.8'
            ],
        ];

        $content = view('sitemap', compact('pages'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
