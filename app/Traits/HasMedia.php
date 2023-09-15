<?php

namespace App\Traits;

use App\Models\Media;

trait HasMedia
{
    public function medias()
    {
        return $this->morphMany(Media::class,'mediable');
    }


}
