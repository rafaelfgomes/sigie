<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [ 'name', 'cpf', 'birth_date', 'email', 'status', 'contact_id', 'address_id' ];

    public function address()
    {
        return $this->hasMany('App\Address');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
