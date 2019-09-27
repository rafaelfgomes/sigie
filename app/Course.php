<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [ 'name', 'status' ];

    public function students()
    {

        $this->hasMany('App\Students');
    
    }

    public function institutions()
    {

        $this->belongsToMany('App\Institution');
    
    }

}
