<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = ['uuid', 'comment', 'commentable_id', 'commentable_type', 'user_id', 'parent_id', 'published'];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
