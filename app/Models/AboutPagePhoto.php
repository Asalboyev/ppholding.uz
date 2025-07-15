<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPagePhoto extends Model
{
    use HasFactory;

    public function aboutPage() {
        return $this->belongsTo('Models\AboutPage');
    }
}
