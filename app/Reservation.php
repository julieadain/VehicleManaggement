<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected  $table='reservations';
    protected $fillable = ['start_date_time','end_date_time','seat_capacity','ac','share','pickup_address',
        'location','start_meter_reading','end_meter_reading','total_payable','user_id','org_id','client_id','vehicle_id','driver_id'];

//    public function vehicles(){
//
//        return $this->hasOne('App\Vehicle','vehicle_id','id');
//    }
}
