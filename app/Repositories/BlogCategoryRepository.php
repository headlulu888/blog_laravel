<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\CoreRepository as CoreRepo;

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
        // return $this->startConditions()->all();

        $fields = implode(',', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        /*$result[] = $this->startConditions()->all();
        $result[] = $this
            ->startConditions()
            ->select('blog_categories.*',
                \DB::raw('CONCAT (id, ". ", title) AS id_title'))
            ->toBase()
            ->get();*/

        $result = $this
            ->startConditions()
            ->selectRaw($fields)
            //->toBase()
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

    public function getAllWithPaginate($perPage = null)
    {
        $fields = ['id', 'title', 'parent_id'];
        $result = $this->startConditions()->select($fields)->paginate($perPage);

        return $result;
    }
}