<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    //eloquent relation with blood group
    public function bloodGroup(){
        return $this->belongsTo('App\Models\BloodGroup','blood_group_id');
    }
    //eloquent relation with district
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }
}
