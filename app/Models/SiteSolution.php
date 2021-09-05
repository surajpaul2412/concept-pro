<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSolution extends Model
{
    protected $fillable = [
        'heading','content','meta_title','meta_keyword','meta_desc'
    ];
}
