<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable= ['name','email','phone','address','org_id'];

    public function organizations(){
        return $this->belongsTo('\App\organization','org_id','id');
    }
}
