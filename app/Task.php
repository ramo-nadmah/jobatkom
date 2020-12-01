<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //


    public function employer(){
        return $this->belongsTo("App\Employer");
    }

    public function category(){
        return $this->belongsTo("App\Category");
    }
    public function task_bids()
    {
        return $this->hasMany("App\Task_bid");
    }
}
