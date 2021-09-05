<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id','categoryItem_id','name','SKU','slug','meta_title','meta_keyword','meta_desc','description','overview','image','order'
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($products) {
            $products->update(['slug' => $products->slug]);
        });
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function categoryItem()
    {
        return $this->belongsTo('App\Models\CategoryItem','categoryItem_id');
    }

    public function productVideos()
    {
        return $this->hasMany('App\Models\ProductVideo');
    }

    public function productDownloads()
    {
        return $this->hasMany('App\Models\ProductDownload');
    }
}
