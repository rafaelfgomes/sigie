<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $fillable = [ 'phone', 'mobile' ];

    public function student()
    {

        return $this->belongsTo('App\Student');
    
    }

}
