<?php

use App\Models\Translation;

function translation($key) {
    $lang = \App::getLocale();
    if (isset(Translation::where('key', $key)->pluck('val')->toArray()[0][$lang])) {
        $translation = Translation::where('key', $key)->pluck('val')->toArray()[0][$lang];
    } else {
        $translation = Translation::where('key', $key)->pluck('val')->toArray()[0]['ru'];
    }

    return $translation;
}
