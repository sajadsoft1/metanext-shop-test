<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory,HasUuid;

    protected $fillable =
        [
        'uuid',
        'title',
    ];

    public static function orderByDesc(string $string)
    {
    }

    public static function create(mixed $data)
    {
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
