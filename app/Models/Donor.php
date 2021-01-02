<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Donor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'donor';

    protected $fillable = [
        'name', 'phone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //eloquent relation with blood group
    public function bloodGroup(){
        return $this->belongsTo('App\Models\BloodGroup','blood_group_id');
    }
    //eloquent relation with district
    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }
}
