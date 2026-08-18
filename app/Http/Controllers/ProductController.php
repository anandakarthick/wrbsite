<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    /**
     * Products listing page - loops over resources/data/products.json
     */
    public function index()
    {
        $products = $this->loadProducts();

        return view('products', ['products' => $products]);
    }

    /**
     * Single product detail page
     */
    public function show(string $slug)
    {
        $products = $this->loadProducts();

        $product = collect($products)->firstWhere('slug', $slug);

        abort_if($product === null, 404);

        $related = collect($products)
            ->where('slug', '!=', $slug)
            ->take(3)
            ->values()
            ->all();

        return view('product-detail', [
            'product' => $product,
            'related' => $related,
        ]);
    }

    /**
     * Read and decode the products JSON file
     *
     * @return array
     */
    private function loadProducts(): array
    {
        $path = resource_path('data/products.json');

        if (!file_exists($path)) {
            return [];
        }

        $data = json_decode(file_get_contents($path), true);

        return $data['products'] ?? [];
    }
}
