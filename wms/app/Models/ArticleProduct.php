<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticleProduct extends Pivot
{
    use HasFactory;

    protected $table = 'article_product';
}
