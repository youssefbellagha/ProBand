<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Countrie;
class Citie extends Model
{
    
protected $fillable = [
        'name','countrie_id'
    ];
      public function Countrie()
    {
        //
        return $this->belongsTo('App\Models\Countrie');
    }
}
