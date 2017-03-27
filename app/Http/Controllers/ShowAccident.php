<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\accident;
use App\informationusers;
use DB;

class ShowAccident extends Controller
{
    public function listaccident(){
    	$test = accident::all();
    	return view('tables', compact('test'));
    }
    public function countaccident(){
    	$countacc = accident::count();
    	$test = accident::all();
    	$countrate1 = ($test->where('rate_id', 101)->count());
    	$countrate101 = ($countrate1/$countacc)*100;

    	$countrate2 = $test->where('rate_id', 102)->count();
    	$countrate102 = ($countrate2/$countacc)*100;

    	$countrate3 = $test->where('rate_id', 103)->count();
		$countrate103 = ($countrate3/$countacc)*100;

    	$countrate4 = $test->where('rate_id', 104)->count();
		$countrate104 = ($countrate4/$countacc)*100;

    	$countrate5 = $test->where('rate_id', 105)->count();
		$countrate105 = ($countrate5/$countacc)*100;

        $countemeruser = DB::table('emergencysms')->where('status_emergency','=', 0)->count();
        $countemerall = DB::table('emergencysms')->count();
    	$countuser = informationusers::count();
    	return view('index', compact('countacc','countemeruser','countemerall','countuser','countrate101','countrate102','countrate103','countrate104','countrate105','countrate1','countrate2','countrate3','countrate4','countrate5'));
    }

    public function deleteUser($accId) {
    	$user = accident::where('acc_id', $accId)->delete();
    	return redirect()->back();
    }
    
    
}
