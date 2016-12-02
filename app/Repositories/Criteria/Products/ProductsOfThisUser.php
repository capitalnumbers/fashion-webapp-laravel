<?php
namespace App\Repositories\Criteria\Products;

use App\Repositories\Contracts\RepositoryInterface as Repository;
use App\Repositories\Criteria\Criteria;

class ProductsOfThisUser extends Criteria {

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $query = $model->where('product_seller', '=', auth()->id());
        return $query;
    }
}