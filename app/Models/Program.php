<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    public function students()
    {
        return $this->hasMany(\App\Models\Student::class);
    }
}
