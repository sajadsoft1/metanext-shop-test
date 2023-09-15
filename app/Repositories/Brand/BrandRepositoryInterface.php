<?php

namespace App\Repositories\Brand;

use App\Repositories\BaseRepositoryInterface;
use App\Models\Brand;

interface BrandRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel(): Brand;
}
