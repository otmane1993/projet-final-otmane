<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sejour;

class Ville extends Model
{
    protected $guarded=[];
    public function sejours()
    {
        return $this->hasMany(Sejour::class,'Ville_id','id');
    }
}
