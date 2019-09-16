<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'org_name', 'address', 'trade_license_copy', 'status'
    ];

    public function users()
    {

        return $this->hasMany(User::class, 'org_id');

    }

    public function getOwnerAttribute()
    {
        return $this->users()->where('status', '1')->first();
    }

 /*   public function getOrgNameAttribute($value)
    {
        return strtoupper($value);
    }*/

}
