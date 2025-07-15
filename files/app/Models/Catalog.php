<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'array',
        'desc' => 'array'
    ];

    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}
