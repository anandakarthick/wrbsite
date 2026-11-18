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

        // Products we no longer list: ShopNest became KadaiSpot, the rest go to the product list.
        if ($product === null) {
            $retired = ['ka-crm', 'pipeforge', 'kartpos', 'peoplecore', 'insightiq', 'convodesk', 'visionkit', 'documind', 'voxa-ai', 'agentforge'];
            if ($slug === 'shopnest') {
                return redirect()->route('product.show', 'kadaispot', 301);
            }
            if (in_array($slug, $retired, true)) {
                return redirect()->route('products', [], 301);
            }
        }

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
