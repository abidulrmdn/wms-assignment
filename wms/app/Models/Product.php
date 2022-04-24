<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';

    public function articles()
    {
        return $this
        ->belongsToMany('App\Models\Article')
        ->using('App\Models\ArticleProduct')
        ->withPivot([
                    'quantity',
                ]);
    }
}
