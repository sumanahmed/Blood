<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //eloquent relation with division
    public function division(){
        return $this->belongsTo('App\Models\Division','division_id');
    }
}
