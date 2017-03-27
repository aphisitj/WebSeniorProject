<?php
use App\accident;
use App\Http\Requests;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();


Route::group(['middleware' => 'checklogin'], function(){

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', 'ShowAccident@countaccident');
Route::get('/tables_1', 'ShowUser@listuser');
Route::get('/tables', 'ShowAccident@listaccident');
Route::get('/emergencycase', 'Showemergencycase@listemergency');
Route::get('/deleteUser/{accId}','ShowAccident@deleteUser');
Route::get('/deleteInformationUser/{email}','ShowUser@deleteUser');

Route::get('/acclist', function()
{
  $accident = accident::all();
  return json_encode($accident);
});
//Route::get('/ms/{para1?}/{para2?}', function ($para1='Aphisit',$para2='jankiaw') {
//	$data['name'] = $para1;
//	$data['lname'] = $para2;
//	$data['people'] = ['moss','ming','min'];
    //return view('about',$data);
//});
Route::get('/plus/{num1?}/{num2?}', function ($num1=0,$num2=0) {
	echo $num1.'+'.$num2.'='.($num1+$num2); 
});



Route::get('/home', 'HomeController@index');

});
