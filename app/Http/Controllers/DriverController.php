<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Driver;
use App\User;

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
       'DriverNo'   	=> 'required|max:50|unique:drivers,DriverNo',
       'DriverName'   => 'required|max:200',
       'Birthday'     => 'required|date',
       'Address'      => 'required|max:500',
       'FrWork'       => 'required|date',
       'Cmnd'         => 'required|max:50',
       'Sex'          => 'required|max:1|numeric',
       'Phone'        => 'required|numeric|unique:drivers,Phone',
       'idUser'       => '',
       'Email'        => 'nullable|max:200',
       'Status'       => 'required|numeric',
       'Notes'		    => 'nullable|max:1000',
       'Avatar'       => 'nullable|max:500'
   ]
   ,[
       'required'   => ':attribute không được để trống',
       'max' 		    => ':attribute không được lớn hơn :max',
       'unique'     => ':attribute trùng với thông tin hồ sơ khác'
	],
	[
		  'DriverNo'    => 'Mã lái xe',
		  'DriverName'  => 'Họ tên lái xe',
	    'Birthday'    => 'Ngày sinh',
	    'Address'     => 'Địa chỉ',
      'DayWork'     => 'Ngày vào làm',
      'Cmnd'        => 'Chứng minh nhân dân',
      'Sex'         => 'Giới tính',
      'Phone'       => 'Số điện thoại',
      'idUser'      => 'Mã người dùng',
      'Email'       => 'Email',
	    'Status'      => 'Trạng thái',
	    'Notes'       => 'Ghi chú',
	    'Avatar'      => 'Ảnh'
	]);


  $driver['Birthday'] = date("Y-m-d",strtotime($driver['Birthday'])); 
  $driver['FrWork']   = date("Y-m-d",strtotime($driver['FrWork']));

  $name   = $driver['DriverName'];
  $userNo = $driver['DriverNo'];
  $email  = $driver['Email'];
  $level  = 0;
  $username = $driver['Phone'];
  $password = $driver['DriverNo'];
  $aUser = [$name, $userNo, $email, $level, $username, bcrypt($password)];


  $uSel = DB::table('users')->select('users.id')->where('users.username','LIKE','%' . $username . '%')->get();

  if(count($uSel) == 0){
    DB::insert('insert into users (name, userNo, email, level, username, password) values (?, ?, ?, ?, ?, ?)', $aUser);
    $uSel = DB::table('users')->select('users.id')->where('users.username','LIKE','%' . $username . '%')->get();
  }else {
    User::where('username',$username)->update(array(
                         'level'=>$level,
    ));
  }

  $driver["idUser"] = $uSel[0]->id;

	Driver::create($driver);

  return back()->with('success', 'Thêm thành công !!');
  }

  public function getManagerDriver_Edit($id){
  $driver = Driver::find($id);
  return view("event.managerDriver_Edit",compact('driver','id'));
  }

  public function getManagerDriver_Delete($DriverCd){
  	DB::table('drivers')->where('DriverCd',$DriverCd)->delete();
   return redirect('manager/Driver');
 }

}
