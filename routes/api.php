<?php

use Illuminate\Http\Request;
use App\User;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user','UserController@index');
Route::get('user/{name}','UserController@show');
Route::post('user','UserController@store');
Route::put('user/{id}','UserController@update');
Route::delete('user/{id}','UserController@delete');
// Route::get('users',function(){
// 	return User::all();
// });

// Route::get('users/{name}',function($name){
// 	return User::find($name);
// });

// Route::put('users',function(Request $request,$id){
// 	$user=User::findOrFail($id);
// 	$user->update($request->all());

// 	return $user;
// });

// Route::delete('users/{id}',function($id){
// 	User::find($id)->delete();

// 	return 204;
// });