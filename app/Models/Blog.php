<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table="blogs";
    //eloquent relation with category
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
