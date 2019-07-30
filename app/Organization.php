<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'org_name', 'address', 'trade_license_copy', 'status'
    ];
}
