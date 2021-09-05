<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'heading','sub_heading','btn_url','image','bg','url','order'
    ];}
