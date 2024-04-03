<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SmecMailController;
use App\Http\Controllers\SmecLokalController;
use App\Http\Controllers\CRMOTPController;

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

Route::get('/', function () {
    return view('welcome');
});
//ROUTE LOKAL
Route::get('mailtemplate', [MailController::class, 'index']);
Route::get('downloadexcel',[MailController::class,'download_excel']);
//ROUTE SMEC LOKAL
Route::get('smecv_net',[SmecLokalController::class,'index']);
//ROUTE SMEC MALAYSIA
Route::get('mailexcel/{sales}', [SmecMailController::class, 'tampilan']);

//ROUTE OTP CRM
Route::get('send_otp/{otp}/{mail}',[CRMOTPController::class,'Send_OTP']);