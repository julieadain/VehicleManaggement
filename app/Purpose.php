<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = [
        'title'
    ];

    public function expenses(){

        return $this->hasMany( Expense::class, 'purpose_id');
    }
}
