<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVideo extends Model
{
    protected $fillable = [
        'product_id','type','name','url'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
