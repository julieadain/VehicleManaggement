<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, string $string1, string $string2)
 */
class Organization extends Model
{
    protected $fillable = [
        'org_name', 'address', 'trade_license_copy', 'status'
    ];

    public function users()
    {

        return $this->hasMany(User::class, 'org_id');

    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
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
