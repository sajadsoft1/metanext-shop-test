<?php

namespace App\Models;

use App\Services\Translation\TranslationService;
use App\Traits\HasCategory;
use App\Traits\HasComment;
use App\Traits\HasLike;
use App\Traits\HasMedia;
use App\Traits\HasTranslation;
use App\Traits\HasUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Blog extends Model
{
    use HasFactory, HasMedia, HasComment, HasUser, HasCategory, HasUuid, HasTranslation , HasLike  ;

    protected     $fillable     = ['uuid', 'published', 'category_id', 'user_id','title','body'];


    public function views():MorphMany
    {
        return  $this->morphMany(View::class , 'viewable');
    }




}
