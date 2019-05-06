<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BorrowBooks;
use App\PayBook;
use App\InfoBorrowBooks;
use App\readers;

class ManagerController extends Controller
{
	public function getManager(){
		// $borrowBooks = BorrowBooks::all()->toArray();


		// $payBooks = DB::select('select soPhieuMuon, ngayTra, Count(*) from pay_books Group By soPhieuMuon,ngayTra');	


		// $infoBorrowBooks = DB::select('select soPhieuMuon, hanTra, Count(*) from info_borrow_books Group By soPhieuMuon, trangThai, hanTra having trangThai = 0');

		// $readers = readers::all()->toArray();

		// $dayToDay = date("d");
		
		// $numberBorrowToDay = 0;
		// foreach ($borrowBooks as $borrowBook) {   
		// 	$day = date("d", strtotime($borrowBook['ngayMuon'])); 
		// 	if($day == $dayToDay) {
		// 		$numberBorrowToDay++;
		// 	}
		// }

		// $numberGiveToDay = 0;
		// foreach ($payBooks as $payBook) {   
		// 	$day = date("d", strtotime($payBook->ngayTra)); 
		// 	if($day == $dayToDay) {
		// 		$numberGiveToDay++;
		// 	}
		// }

		// $numberDelay = 0;
		// foreach ($infoBorrowBooks as $infoBorrowBook) {   
		// 	$day = date("d", strtotime($infoBorrowBook->hanTra)); 
		// 	if($day < $dayToDay) {
		// 		$numberDelay++;
		// 	}
		// }

		// $numberReaders = count($readers);

		// $borrowBooks = BorrowBooks::all()->toArray();
	
		// function checkMonth($month, &$yeah) {
		// 	$number = 1;
		// 	for ($i = 0; $i < count($yeah); $i++) {
		// 		if($month == $number) {
		// 			$yeah[$i]++;
		// 		}
		// 		$number++;
		// 	}
		// }

		// $yeahBorow2018 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		// foreach ($borrowBooks as $borrowBook) {   
		// 	$month = date("m", strtotime($borrowBook['ngayMuon'])); 
		// 	checkMonth($month, $yeahBorow2018);
		// }
		// $strYeahBorow2018 = implode(',', $yeahBorow2018);



		// // trả
		// $yeahGiveBook2018 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		// foreach ($payBooks as $payBook) {   
		// 	$month = date("m", strtotime($payBook->ngayTra)); 
		// 	checkMonth($month, $yeahGiveBook2018);
		// }
		// $strYeahGiveBook2018 = implode(',', $yeahGiveBook2018);


		// return view("layout.manager",compact('numberBorrowToDay','numberGiveToDay','numberDelay','numberReaders','strYeahBorow2018','strYeahGiveBook2018'));

		 return view("layout.manager");
	}
}
