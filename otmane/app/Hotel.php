<?php

namespace App;
use App\Sejour;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded=[];
    public function sejours()
    {
        return $this->hasMany(Sejour::class,'Hotel_id','id');
    }
}
