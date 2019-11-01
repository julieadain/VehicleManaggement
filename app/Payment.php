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
public function Organization()
{
    return $this->belongsTo(Organization::class, 'org_id');
}
public function Reservation()
{
    return $this->belongsTo(Reservation::class, 'res_id');
}
public function Client()
{
    return $this->belongsTo(Client::class, 'client_id');
}

}
