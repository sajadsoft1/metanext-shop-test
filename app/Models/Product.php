<?php

namespace App\Models;

use App\Traits\HasCategory;
use App\Traits\HasComment;
use App\Traits\HasMedia;
use App\Traits\HasUser;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, HasUuid, HasMedia, HasUser, HasComment, HasCategory;

    protected $fillable = ['uuid',
                           'user_id',
                           'category_id',
                           'brand_id',
                           'title',
                           'body',
                           'inventory',
                           'published',
                           'price'];


    //wagwagwag
}
