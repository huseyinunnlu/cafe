<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserv;

class ReservationController extends Controller
{
	public function index()
	{
		if(request()->get('sort') && request()->get('sort')!= 'norm'){
			$date = date("y-m-d",strtotime(request()->get('sort')));
			$now = date("y-m-d");
			$reservations = Reserv::whereBetween('date',[$now,$date])->paginate(5) ?? abort(404,'Page Not Found');
		}else{
			$reservations = Reserv::paginate(5) ?? abort(404,'Page Not Found');
		}
		return view('adminpanel.reservations.list',compact('reservations'));
	}

	public function destroy($id)
	{
		Reserv::find($id)->delete() ?? abort('404','Reservation Not Found');
		return redirect()->route('reservation.index')->withsuccess('Reservation Deleted Successfuly');
	}

	public function detail($id)
	{
		if(request()->get('sort') && request()->get('sort')!= 'norm'){
			$date = date("y-m-d",strtotime(request()->get('sort')));
			$now = date("y-m-d");
			$reservations = Reserv::whereBetween('date',[$now,$date])->paginate(5) ?? abort(404,'Page Not Found');
		}else{
			$reservations = Reserv::paginate(5) ?? abort(404,'Page Not Found');
		}

		$reservv = Reserv::find($id) ?? abort('404','Reservation Not Found');
		return view('adminpanel.reservations.list',compact('reservv','reservations')); 
	}

}
