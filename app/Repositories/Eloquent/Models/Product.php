<?php

namespace App\Repositories\Eloquent\Models;

use Illuminate\Database\Eloquent\{Model,SoftDeletes};

class Product extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['currency_code', 'created_at', 'updated_at'];

    /**
     * Get the user that sells the product.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'product_seller');
    }
}
