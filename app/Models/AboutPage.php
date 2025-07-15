<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    use HasFactory;

    protected $casts = [
        'desc1' => 'array',
        'desc2' => 'array',
        'desc3' => 'array',
        'done1' => 'array',
        'done2' => 'array',
        'done3' => 'array',
        'done1_text' => 'array',
        'done2_text' => 'array',
        'done3_text' => 'array',
    ];

    public function aboutPagePhotos() {
        return $this->hasMany('Models\AboutPagePhoto');
    }
}
