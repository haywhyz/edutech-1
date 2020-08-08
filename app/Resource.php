<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Topic;

class Resource extends Model
{
    protected $fillable = [
        'subject_id', 'week_id', 'topic_id', 'file',
    ];


    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }
}
