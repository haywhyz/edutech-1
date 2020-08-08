<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Level extends Model
{
    protected $fillable = [
        'name',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
