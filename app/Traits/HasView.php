<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\View;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasView
{
    public function views():MorphMany
    {
        return  $this->morphMany(View::class , 'viewable');
    }
}
