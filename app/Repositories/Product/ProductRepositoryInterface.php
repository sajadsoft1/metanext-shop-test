<?php

namespace App\Repositories\Product;

use App\Repositories\BaseRepositoryInterface;
use App\Models\Product;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel(): Product;
}
