<?php

namespace App\Services\Translation;

class TranslationService
{

    public static function get($model, $key): string
    {
        return $model->translation()->where('key', $key)->first()->value ?? '';
    }

    public static function store($model, $key, $value)
    {
        $model->translation()->updateOrCreate(
            [
                'locale' => app()->getLocale(),
                'key'    => $key,
            ],[
            'value'  => $value,
        ]);
    }
}
