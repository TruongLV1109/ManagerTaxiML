<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Driver;

class DriverController extends Controller
{
     public function getManagerDriver(){
        $drivers = Driver::all()->toArray();
        $stt = 0;
        return view("layout.managerDriver",compact('drivers','stt'));
    }

     public function getManagerDriver_Add(){
    	
    	return view("event.managerDriver_Add");
    }
}
