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

    public function postManagerDriver_Add(Request $request){
     $driver = $this->validate(request(), [
       'DriverCd'	=> 'nullable|max:10',
       'DriverNm'   => 'nullable|max:200',
       'Birthday'   => 'nullable|max:8',
       'Cmnd'       => 'nullable|max:50',
       'Address'    => 'nullable|max:500',
       'DayWork'    => 'nullable|max:8',
       'Status'     => 'nullable|max:50',
       'Notes'		=> 'nullable|max:1000',
       'Avatar'     => 'nullable|max:500'
   ]
   ,[
    'required'  => ':attribute không được để trống',
    'max' 		=> ':attribute không được lớn hơn :max'
	],
	[
		'DriverCd' => 'Mã lái xe',
		'DriverNm' => 'Họ tên lái xe',
	    'Birthday' => 'Nhà xuất bản',
	    'Cmnd'	   => 'Chứng minh nhân dân',
	    'Address'  => 'Ngày sinh',
	    'DayWork'  => 'Ngày vào làm',
	    'Status'   => 'Trạng thái',
	    'Notes'    => 'Ghi chú',
	    'Avatar'   => 'Ảnh'
	]);

    $today = date("ymd");   

	$driverSeq = substr(DB::table('drivers')
    ->select('drivers.DriverCd')
    ->where('drivers.DriverCd','LIKE','%' . $today . '%')
    ->get()->max('DriverCd'), 6);

    $seq = $driverSeq;

    if($seq == ''){
     	$seq = "0001";
    }else {
     	$seq = str_pad(((int)$seq + 1), 4, '0', STR_PAD_LEFT);
    }

    $driverCd = $today . $seq;

    $driver["DriverCd"] = $driverCd;

	Driver::create($driver);

     return back()->with('success', 'Thêm thành công mã số lái xe: ' . $driverCd);

  }

  public function getManagerDriver_Edit($DriverCd){

	  $driver = DB::table('drivers')
        ->select('*')
        ->where('drivers.DriverCd','=', $DriverCd)
        ->get();

	  return view("event.managerDriver_Edit",compact('driver','DriverCd'));
  }

  public function getManagerDriver_Delete($DriverCd){
  	DB::table('drivers')->where('DriverCd',$DriverCd)->delete();
   return redirect('manager/Driver');
 }

}
