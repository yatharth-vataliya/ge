<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function institute(){
    	return $this->belongsTo(\App\Models\Institute::class);
    }

    public function department(){
    	return $this->belongsTo(\App\Models\Department::class);
    }

    public function program(){
    	return $this->belongsTo(\App\Models\Program::class);
    }

    public function course(){
    	return $this->belongsTo(\App\Models\Course::class);
    }
}
