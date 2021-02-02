<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function checklist ()
    {
    	return $this->belongTo(Checklist:class, 'task_id', 'id');
    }
}
