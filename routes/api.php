<?php

use Illuminate\Http\Request;
use App\User;                               // bring in
use App\Http\Resources\UserResource;        // bring in

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

# api/user -> login required -> ?
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

# api/users ->json response
Route::get('/users', function (Request $request) {
    $users = User::paginate(10);
    return UserResource::collection($users);  
});

