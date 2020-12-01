<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'location','about','logo','category_id',
    ];



    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tasks(){
        return $this->hasMany("App\Task");
    }

    public function jobs(){
        return $this->hasMany("App\Job");
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
