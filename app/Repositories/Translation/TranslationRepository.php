<?php

namespace App\Repositories\Translation;

use App\Models\Translation;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class TranslationRepository extends BaseRepository implements TranslationRepositoryInterface
{
    public function __construct(Translation $model)
    {
        parent::__construct($model);
    }

   public function getModel(): Translation
   {
       return parent::getModel();
   }
}
