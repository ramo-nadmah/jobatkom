<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //



    public function employer(){
        return $this->belongsTo("App\Employer");
    }

    public function category(){
        return $this->belongsTo("App\Category");
    }

    public function job_bids()
    {
        return $this->hasMany("App\Job_bid");
    }

}
