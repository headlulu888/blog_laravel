<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use App\Repositories\CoreRepository as CoreRepo;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BlogPostRepository extends CoreRepo
{
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            //->with(['category', 'user'])
            ->with([
                'category' => function($query) {
                    $query->select(['id', 'title']);
                },
                'user:id,name'
            ])
            ->paginate(25);
            //->get();
            //dd($result->first());
        return $result;
    }
}