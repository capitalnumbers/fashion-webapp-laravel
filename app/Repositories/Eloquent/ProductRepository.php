<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

/**
* Repository to handle products.
*/
class ProductRepository extends BaseRepository implements ProductRepositoryInterface {

    function model()
    {
        return 'App\Repositories\Eloquent\Models\Product';
    }
}
?>