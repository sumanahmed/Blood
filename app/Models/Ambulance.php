<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
    protected $table = "ambulances";

    protected $fillable = [
         'name','driver_name','driver_phone'
    ];
}
