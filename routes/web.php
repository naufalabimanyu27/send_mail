<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SmecMailController;
use App\Http\Controllers\BlastController;

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
Route::get('mailtemplate', [MailController::class, 'index']);
Route::get('sendhtmlemail',[SendMailController::class, 'index']);
Route::get('mailtemplatecc', [SmecMailController::class, 'tampilan']);
Route::get('sendmailcc', [SmecMailController::class, 'kirim']);
// BLAST EMAIL
Route::get('blastview',[BlastController::class,'index']);
Route::get('blast',[BlastController::class,'send']);