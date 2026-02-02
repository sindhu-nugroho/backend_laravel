<?php

namespace App\Services\Product;

interface ProductCleanupServiceInterface
{
    public function deleteOldestProduct(): ?int;
}
