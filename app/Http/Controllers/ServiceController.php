<?php

namespace App\Http\Controllers;

class ServiceController extends Controller
{
    /**
     * Single service detail page - data comes from resources/data/services.json
     */
    public function show(string $slug)
    {
        $services = $this->loadJson('services.json', 'services');

        $service = collect($services)->firstWhere('slug', $slug);

        abort_if($service === null, 404);

        // Resolve related product slugs into full product entries
        $allProducts = collect($this->loadJson('products.json', 'products'));
        $relatedProducts = collect($service['products'] ?? [])
            ->map(fn ($productSlug) => $allProducts->firstWhere('slug', $productSlug))
            ->filter()
            ->values()
            ->all();

        // Other services for the bottom navigation
        $otherServices = collect($services)
            ->where('slug', '!=', $slug)
            ->values()
            ->all();

        return view('service-detail', [
            'service' => $service,
            'relatedProducts' => $relatedProducts,
            'otherServices' => $otherServices,
        ]);
    }

    /**
     * Read a data file from resources/data
     *
     * @return array
     */
    private function loadJson(string $file, string $key): array
    {
        $path = resource_path('data/' . $file);

        if (!file_exists($path)) {
            return [];
        }

        $data = json_decode(file_get_contents($path), true);

        return $data[$key] ?? [];
    }
}
