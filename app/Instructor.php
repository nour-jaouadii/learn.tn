<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{

    protected $fillable = [
        'name', 'photo', 
    ];


    public function course()
    {
        return $this->hasOne('App\Course');
    }
}
