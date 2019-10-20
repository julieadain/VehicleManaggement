<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    const RUNNING = 111;
    const DONE = 000;

    protected  $table='reservations';
    protected $fillable = ['start_date_time','end_date_time','seat_capacity','ac','share','pickup_address',
        'location','start_meter_reading','end_meter_reading','total_payable','user_id','org_id','client_id','vehicle_id','driver_id','status'];

    public function vehicles(){

        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function clients(){
        return $this->belongsTo('App\Client','client_id');
//                return $this->belongsTo(Reservation::class,'client_id');

    }
    public  function drivers(){
        return $this->belongsTo('App\Driver','driver_id');
    }
}
