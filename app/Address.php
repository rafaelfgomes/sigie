<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    protected $fillable = [ 'street', 'number', 'neighbour', 'zipcode', 'city', 'state' ];

    public function student()
    {

        return $this->belongsTo('App\Student');
    
    }

}
