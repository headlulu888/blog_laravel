<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CoreRepository as CoreRepo;

/**
 * Class BlogCategoryRepository
 * @package App\Repositories
 */
class BlogCategoryRepository extends CoreRepo
{
    /**
     * @param $id
     * @return mixed
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * @return Collection|\Illuminate\Database\Eloquent\Model[]|\Illuminate\Foundation\Application[]|mixed[]
     */
    public function getForComboBox()
    {
        $fields = implode(',', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($fields)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }

    /**
     * @param null $perPage
     * @return mixed
     */
    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];
        $result = $this
            ->startConditions()
            ->select($fields)
            ->with([
                'parentCategory:id,title'
            ])
            ->paginate($perPage);

        return $result;
    }
}