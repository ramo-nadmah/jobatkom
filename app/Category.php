<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function tasks(){
        return $this->hasMany("App\Task");
    }

    public function jobs(){
        return $this->hasMany("App\Job");
    }

    public function employer()
    {
        return $this->hasMany('App\Employer');
    }
}
