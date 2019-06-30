<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Class BlogPostObserver
 * @package App\Observers
 */
class BlogPostObserver
{
    /**
     * @param BlogPost $blogPost
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }

    /**
     * @param BlogPost $blogPost
     */
    public function updating(BlogPost $blogPost)
    {
        /*$test[] = $blogPost->isDirty();
        $test[] = $blogPost->isDirty('is_published');
        $test[] = $blogPost->isDirty('user_id');
        $test[] = $blogPost->getAttribute('is_published');
        $test[] = $blogPost->is_published;
        $test[] = $blogPost->getOriginal('is_published');
        dd($test);*/

        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        if (empty($blogPost->published_at) && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * @param BlogPost $blogPost
     */
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

    /**
     * @param BlogPost $blogPost
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    /**
     * Handle the models blog post "created" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    /**
     * @param BlogPost $blogPost
     */
    public function deleting(BlogPost $blogPost)
    {
        // dd(__METHOD__, $blogPost);
        // return false;
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        // dd(__METHOD__, $blogPost);
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }
}
