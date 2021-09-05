<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','image','slug','meta_title','meta_keyword','meta_desc','order'
    ];

    public function categoryItems()
    {
        return $this->hasMany('App\Models\CategoryItem','category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
