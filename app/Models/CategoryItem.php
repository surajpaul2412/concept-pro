<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryItem extends Model
{
    protected $fillable = [
        'category_id','name','image','slug','meta_title','meta_keyword','meta_desc','order'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
