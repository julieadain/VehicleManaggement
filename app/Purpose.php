<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = [
        'title'
    ];

    public function expense(){

        return $this->hasMany( Expense::class, 'purpose_id');
    }
}
