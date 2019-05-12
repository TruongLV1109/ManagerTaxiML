<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'DriverNo','DriverName','Birthday','Address','FrWork','Cmnd','Phone','idUser','Email','Status','Notes','Avatar'
    ];
}
