<?php

namespace App;
use App\Hotel;
use App\Ville;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Sejour extends Model
{
    protected $guarded=[];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
