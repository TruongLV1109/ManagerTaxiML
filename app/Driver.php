<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
     protected $fillable = [
        'DriverCd','DriverNm','Birthday','Address','DayWork','Cmnd','Status','Notes','Avatar'
    ];
}
