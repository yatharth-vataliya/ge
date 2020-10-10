<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $guarded = [];

    public function departments(){
    	return $this->hasMany(\App\Models\Department::class);
    }

    public function students(){
        return $this->hasMany(\App\Models\Student::class);
    }

}
