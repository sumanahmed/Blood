<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thana extends Model
{
    //eloquent relation with division
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }
}
