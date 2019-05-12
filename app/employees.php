<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
     protected $fillable = [
        'EmployeeNo','EmployeeName', 'Address', 'Birthday', 'FrWork', 'Cmnd','Sex', 'Phone', 'level', 'idUser', 'Email', 'Avatar', 'Status', 'Notes', 'CreMan', 'UpMan'
    ];
}
