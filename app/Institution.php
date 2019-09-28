<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{

    protected $fillable = [ 'name', 'cnpj', 'status' ];

    public function courses()
    {

        return $this->hasMany('App\Course');
    
    }

}
