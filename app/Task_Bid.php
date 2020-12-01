<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task_Bid extends Model
{
    //

    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    public function freelancer()
    {
        return $this->belongsTo('App\Freelancer');
    }
}
