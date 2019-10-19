<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['brand', 'model', 'color', 'reg_number', 'reg_date', 'seat_capacity', 'ac', 'reg_scan_copy',
        'photo', 'insurance_scan_copy', 'roadPermit_scan_copy', 'ownership_status', 'status', 'user_id', 'org_id'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}


