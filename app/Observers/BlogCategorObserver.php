<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

/**
 * Class BlogCategorObserver
 * @package App\Observers
 */
class BlogCategorObserver
{
    /**
     * Handle the models blog category "created" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * @param BlogCategory $blogCategory
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    /**
     * @param BlogCategory $blogCategory
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

    /**
     * Handle the models blog category "updated" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * @param BlogCategory $blogCategory
     */
    public function updating(BlogCategory $blogCategory)
    {
//        dd(__METHOD__, $blogCategory->isDirty(), $blogCategory->getDirty());
        $this->setSlug($blogCategory);
    }

    /**
     * Handle the models blog category "deleted" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "restored" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "force deleted" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}
