<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use App\Repositories\CoreRepository as CoreRepo;

class BlogPostRepository extends CoreRepo
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }
}