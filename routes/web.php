<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | This file is where you may define all of the routes that are handled
 * | by your application. Just tell Laravel the URIs it should respond
 * | to using a Closure or controller method. Build something great!
 * |
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;		// bring in
use App\Data;								// bring in

Route::get ( '/', function (Request $request) 
{
	# ok
	$data = Data::all();
	session()->flash('message', 'data loaded');
	return view ('welcome')->with('data', $data);
	
	# ok
	$data = Data::where('salary','>', 8000)->get();
	return view('welcome', compact('data', $data));	
	
	# ok
	$data = Data::all();
	return view ('welcome')->withData($data);
} );

Route::post('/editItem', function (Request $request) 
{
	$rules = array(
			'fname' => 'required | alpha',
			'lname' => 'required | alpha',
			// 'email' => 'required | email',
			'gender' => 'required',
			'country' => 'required | regex:/^[\pL\s\-]+$/u',
			'salary' => 'required | regex:/^\d*(\.\d{2})?$/' 
	);
	# validate
	$validator = Validator::make(Input::all (), $rules);
	if ($validator->fails())		
		return Response::json( array('errors' => $validator->getMessageBag()->toArray()) );
	else {		
		$data = Data::findOrFail ($request->id);
		$data->first_name = ($request->fname);
		$data->last_name = ($request->lname);
		//$data->email = ($request->email);
		$data->gender = ($request->gender);
		$data->country = ($request->country);
		$data->salary = ($request->salary);
		$data->save ();

		return response()->json($data);
	}
} );

Route::post('/deleteItem', function (Request $request) 
{
	Data::find($request->id)->delete();
	
	return response()->json();
} );
