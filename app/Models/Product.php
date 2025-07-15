<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'title' => 'array',
        'desc' => 'array'
    ];

    public function productImages() {
        return $this->hasMany('App\Models\ProductImage');
    }

    public function catalog() {
        return $this->belongsTo('App\Models\Catalog');
    }
}
