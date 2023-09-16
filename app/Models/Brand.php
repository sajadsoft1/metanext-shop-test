<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, HasUuid,SoftDeletes;

    protected $fillable =
        [
            'uuid',
            'title',
        ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
