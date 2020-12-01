<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job_Bid extends Model
{
    //
    protected $fillable = [
        'job_id', 'status', 'freelancer_id','bid','time','time_quantity'
    ];


    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function freelancer()
    {
        return $this->belongsTo('App\Freelancer');
    }
}
