<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable =['name','phone','address','photo','dl_scan','nid_scan','user_id','org_id'];



    public function reservations(){
        return $this->hasMany('App\Reservation','driver_id');
    }



}
