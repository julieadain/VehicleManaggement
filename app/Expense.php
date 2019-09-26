<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{

    protected $fillable = [
        'amount', 'purpose_id', 'created_at'
    ];

    public function purpose(){

        return $this->belongsTo( Purpose::class, 'purpose_id');
    }
}
