<?php

namespace App\Repositories\Media;

use App\Repositories\BaseRepositoryInterface;
use App\Models\Media;

interface MediaRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel(): Media;
}
