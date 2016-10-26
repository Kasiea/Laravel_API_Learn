<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'api/v1'],function (){

    Route::resource('lessons','LessonsController');
    Route::resource('lessons','LessonsController@store');

});*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace'=>'App\Api\Controllers'],function ($api){
        $api->post('user/login','AuthController@authenticate');
        $api->post('user/register','AuthController@register');
        $api->group(['middleware'=>'jwt.auth'],function ($api){
            $api->get('lessons','LessonsController@index');
            $api->get('lessons/{id}','LessonsController@show');
        });

    });
});





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
