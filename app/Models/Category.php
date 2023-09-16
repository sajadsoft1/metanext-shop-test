<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory,HasUuid;
    protected $fillable = ['uuid', 'parent_id', 'published', 'title'];


    public function blogs():HasMany

    {
        return $this->hasMany(Blog::class);
    }

}
