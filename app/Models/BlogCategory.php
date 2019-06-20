<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends \Eloquent
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];
}
