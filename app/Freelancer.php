<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{


    protected $fillable = [
        'user_id', 'first_name', 'last_name','minimal_hourly_rate','skills','tagline','nationality','description','logo','tasks_done'
    ];

    //
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function task_bids()
    {
        return $this->hasMany("App\Task_bid");
    }
}
