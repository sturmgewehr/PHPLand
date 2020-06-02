<?php

namespace App\Observers;

use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryObserver
{
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }

    protected function setSlug(BlogCategory $blogCategory)
    {
        if(empty($blogCategory->slug))
        {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }

    /**
     * Handle the blog category "created" event.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    public function updating(BlogCategory $blogCategory)
    {

    }

    /**
     * Handle the blog category "updated" event.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "deleted" event.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "restored" event.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blog category "force deleted" event.
     *
     * @param  \App\BlogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }
}
