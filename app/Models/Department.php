<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function institute()
    {
        return $this->belongsTo(\App\Models\Institute::class);
    }

    public function programs()
    {
        return $this->hasMany(\App\Models\Program::class);
    }

    public function courses()
    {
        return $this->hasMany(\App\Models\Course::class);
    }

    public function students()
    {
        return $this->hasMany(\App\Models\Student::class);
    }
}
