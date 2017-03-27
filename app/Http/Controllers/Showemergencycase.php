<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
class Showemergencycase extends Controller
{
   

     public function listemergency(){
    	$case = DB::table('emergencysms')
            			->join('Informationusers', 'emergencysms.email', '=', 'Informationusers.email')
            			->select('Informationusers.email', 'Informationusers.phoneno', 'Informationusers.fname','emergencysms.url',
            				'emergencysms.date_emergency')
            			->where('emergencysms.status_emergency','=', 0)
            			->get();
	// $test = emergencysms::all();
    	
    	return view('emergencycase', compact('case'));
    }
}
