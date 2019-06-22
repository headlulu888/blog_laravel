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
        return $this->startConditions()->all();
    }

    /**
     * @return string
     */
    public function getModelClass()
    {
        return Model::class;
    }
}