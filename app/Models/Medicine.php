<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
     protected $table ="medicines";

    protected $fillable = [
      'symptom_id','dose'
    ];
    
    public function symptoms(){
        return $this->belongsTo('App\Models\Symptom','symptom_id');
    }
}
