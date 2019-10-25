<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'date', 'paid', 'remark', 'res_id', 'org_id'
    ];
public function Package()
{
    return $this->belongsTo(Package::class, 'package_id');
}
}
