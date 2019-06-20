<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\BlogPost
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogPost onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BlogPost query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\BlogPost withoutTrashed()
 * @mixin \Eloquent
 */
class BlogPost extends Model
{
    use SoftDeletes;
}
