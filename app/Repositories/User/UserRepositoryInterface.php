<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepositoryInterface;
use App\Models\User;

interface UserRepositoryInterface extends BaseRepositoryInterface
{
    public function getModel(): User;
}
