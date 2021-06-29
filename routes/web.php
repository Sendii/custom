<?php

use Illuminate\Support\Facades\Route;

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
use Snday\Custom\Customize;
use Illuminate\Http\Request;

Route::get('/', function (Request $req) {
    // $a = new Customize(new \App\User);
    $a = new Customize(\App\User::class);
    $req['_token'] = 'ERi7HVxwlcOcj8gY4kSvT3fuqRwJC2R9L3ICbL4q';
    $req['name'] = 'sendi';
    $req['email'] = 'sendi@sendi.cos'.rand(1, 1000);
    $req['password'] = bcrypt(888888);
    return $a->storeData($req->all());
});