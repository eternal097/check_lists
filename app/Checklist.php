<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    protected $guarded = [];

    public function user ()
    {
    	return $this->belongTo(User:class, 'user_id', 'id');
    }

    public function tasks() 
    {
        return $this->hasMany(Task::class);
    }
}
}
