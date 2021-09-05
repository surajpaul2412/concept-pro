<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDownload extends Model
{
    protected $fillable = [
        'product_id','name','url'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
