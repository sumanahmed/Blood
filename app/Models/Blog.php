<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //eloquent relation with category
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
