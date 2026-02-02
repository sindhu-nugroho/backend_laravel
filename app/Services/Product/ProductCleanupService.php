<?php

namespace App\Services\Product;

use App\Models\Product;

class ProductCleanupService implements ProductCleanupServiceInterface
{
    public function deleteOldestProduct(): ?int
    {
        $product = Product::orderBy('id', 'asc')->first();

        if (!$product) {
            return null;
        }

        $id = $product->id;
        $product->delete();

        return $id;
    }
}
