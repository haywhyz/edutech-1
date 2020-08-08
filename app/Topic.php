<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;

class Topic extends Model
{
    protected $fillable = [
        'name', 'subject_id', 'week_id',
    ];


    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
