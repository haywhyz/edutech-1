<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Subject extends Model
{
    protected $fillable = [
        'name', 'teacher_id', 'class_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
