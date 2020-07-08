<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//展示广播内容页面
Route::get('/', function () {
    return view('welcome');
});

//公共频道推送
Route::get('/send/{message}', function ($message) {
    print_r($message);
    event(new \App\Events\PublicMessageEvent($message));
});

//私有频道推送
Route::get('/send-pri/{userid}/{message}', function ($userid,$message) {
    print_r($userid,$message);
    event(new \App\Events\PublicMessageEvent($userid,$message));
});
