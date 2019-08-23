<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = [
        'name', 'Email', 'phone', 'password'
    ];

    /*public function getManagerAttribute()
    {
        return $this->user()->where('role', '3')->first();
    }*/

}
