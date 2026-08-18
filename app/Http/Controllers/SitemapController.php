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
                'url' => url('/products'),
                'lastmod' => date('Y-m-d'),
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

        // Service detail pages from resources/data/services.json
        $servicesFile = resource_path('data/services.json');
        if (file_exists($servicesFile)) {
            $data = json_decode(file_get_contents($servicesFile), true);
            foreach ($data['services'] ?? [] as $service) {
                $pages[] = [
                    'url' => url('/services/' . $service['slug']),
                    'lastmod' => date('Y-m-d'),
                    'changefreq' => 'monthly',
                    'priority' => '0.8'
                ];
            }
        }

        // Product detail pages from resources/data/products.json
        $productsFile = resource_path('data/products.json');
        if (file_exists($productsFile)) {
            $data = json_decode(file_get_contents($productsFile), true);
            foreach ($data['products'] ?? [] as $product) {
                $pages[] = [
                    'url' => url('/products/' . $product['slug']),
                    'lastmod' => date('Y-m-d'),
                    'changefreq' => 'monthly',
                    'priority' => '0.8'
                ];
            }
        }

        $content = view('sitemap', compact('pages'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
