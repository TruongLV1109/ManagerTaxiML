<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Contract;
use App\ContractType;

class ContractController extends Controller
{
    public function getManagerContract(){
      $contracts = DB::table('contracts')->join('contract_types','contracts.IdContractType','=','contract_types.id')->join('drivers','contracts.IdDriver','=','drivers.id')
        ->select('contracts.id','contracts.ContractNo','contracts.ContractName','drivers.DriverNo','drivers.DriverName','contracts.IdContractType','contract_types.ContractTypeName','contracts.ExDate','status')->get();
      $stt = 0;
      $today = date("Ymd"); 

      for ($i = 0; $i < count($contracts); $i++) {
        $wExDate = date("Ymd",strtotime($contracts[$i]->ExDate)); 
        if($contracts[$i]->IdContractType != 1){
          if($wExDate > $today){
            $contracts[$i]->status = '0';
          }else {
            $contracts[$i]->status = '1';
          }
        }
      }

      return view("layout.managerContract",compact('contracts','stt'));
    }

    public function getManagerContract_Add() {
    	$ContractTypes = ContractType::all()->toArray();
    	return view("event.managerContract_Add",compact('ContractTypes'));
    }

     public function postManagerContract_Add(Request $request){
     $contract = $this->validate(request(), [
       'ContractNo'   	=> 'required|max:50|unique:contracts,ContractNo',
       'ContractSeq'	=> '',
       'ContractName'   => 'required|max:200',
       'IdDriver'		=> 'required|min:1|max:10',
       'IdContractType' => 'required|min:1|max:10',
       'FrDate'     	=> 'required|date',
       'ExDate'			=> 'nullable|date',
       'Notes'		    => 'nullable|max:1000',
       'FileContent'    => 'nullable|max:500'
   ]
   ,[
       'required'   => ':attribute không được để trống',
       'max' 		=> ':attribute không được lớn hơn :max',
       'unique'     => ':attribute trùng với thông tin hồ sơ khác'
	]);


  if($contract['IdContractType'] != 1){
    if($contract['ExDate'] == ''){
      return back()->withErrors('Ngày hết hiệu lực không được để trống !!');
    }else {
      $wFrDate = date("Ymd",strtotime($contract['FrDate'])); 
      $wExDate = date("Ymd",strtotime($contract['ExDate'])); 
        if($wFrDate > $wExDate){
          return back()->withErrors('Ngày hiệu lực không thể lớn hơn ngày hết hiệu lực.');
        }
    }
  }

  $contract['FrDate']   = date("Y-m-d",strtotime($contract['FrDate'])); 
  $contract['ExDate']   = date("Y-m-d",strtotime($contract['ExDate']));

  $uIdDriver = DB::table('drivers')->select('drivers.id')->where('drivers.DriverNo','LIKE','%' . $contract['IdDriver'] . '%')->get();

  if(count($uIdDriver) == 0){
  	return back()->withErrors('Mã số lái xe không tồn tại !!');
  }else {
  	$contract['IdDriver'] = $uIdDriver[0]->id;
  }

  $uSeq = DB::table('contracts')->select('contracts.ContractSeq')->where('contracts.IdDriver','LIKE','%' . $contract['IdDriver'] . '%')->get()->max('ContractSeq');

  if($uSeq == ''){
     	$uSeq = "001";
    }else {
     	$uSeq = str_pad(((int)$uSeq + 1), 3, '0', STR_PAD_LEFT);
    }

  $contract["ContractSeq"] = $uSeq;

  Contract::create($contract);

  return back()->with('success', 'Thêm thành công !!');
  }


  public function getManagerContract_Edit($id){
  $contractTypes = ContractType::all()->toArray();
  $contract = DB::table('contracts')->join('drivers','contracts.IdDriver','=','drivers.id')
  ->select('contracts.id','contracts.ContractNo','contracts.ContractName','contracts.ContractSeq','drivers.DriverNo','contracts.IdContractType','contracts.FrDate','contracts.ExDate','contracts.FileContent','contracts.Notes')
  ->where('contracts.id','=',$id)->get();
  $contract = $contract[0];

  if($contract->IdContractType == 1){
    $contract->FrDate   = date("m/d/Y",strtotime($contract->FrDate)); 
    $contract->ExDate = '';
  }else{
    $contract->FrDate   = date("m/d/Y",strtotime($contract->FrDate)); 
    $contract->ExDate   = date("m/d/Y",strtotime($contract->ExDate));
  }

  return view("event.managerContract_Edit",compact('contract','contractTypes','id'));
  }



}
