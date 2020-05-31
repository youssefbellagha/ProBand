<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Citie;
class Countrie extends Model
{
     protected $fillable = [
        'name','flag','code'    ];

      public function Citie()
    {
        //
        return $this->hasMany('App\Models\Citie');
    }  
}
