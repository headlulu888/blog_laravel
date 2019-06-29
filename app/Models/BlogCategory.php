<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 * @package App\Models
 */
class BlogCategory extends \Eloquent
{
    use SoftDeletes;

    /**
     *  root const
     */
    const ROOT = 1;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    /**
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');

        return $title;
    }

    /**
     * @return int
     */
    public function isRoot()
    {
        return $this->id = BlogCategory::ROOT;
    }

    /**
     * @param $valueFromObject
     * @return bool|mixed|null|string|string[]
     */
    public function getTitleAttribute($valueFromObject)
    {
        return mb_strtoupper($valueFromObject);
    }

    /**
     * @param $incomingValue
     */
    public function setTitleAttribute($incomingValue)
    {
        $this->attributes['title'] = mb_strtoupper($incomingValue);
    }
}
