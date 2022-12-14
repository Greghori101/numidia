<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory,HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;


    function plan(){
        return $this->hasOne(Plan::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function sessions(){
        return $this->hasMany(Session::class);
    }
    function groups(){
        return $this->hasMany(Group::class);
    }
}
