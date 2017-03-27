<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\informationusers;
class ShowUser extends Controller
{
    public function listuser(){
    	$test = informationusers::all();
    	return view('tables_1', compact('test'));
    }
    public function deleteUser($email) {
    	$user = informationusers::where('email', $email)->delete();
    	return redirect()->back();
    }
}
