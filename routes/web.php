<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\SmecMailController;

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

/* DI COMMENT SOALNYA SUDAH DI JADIKAN LARAVEL COMMAND
Route::get('savetodb',[MailController::class,'save_to_sql']);
*/
Route::get('downloadexcel',[MailController::class,'download_excel']);

Route::get('mailtemplatecc', [SmecMailController::class, 'tampilan']);
Route::get('sendmailcc', [SmecMailController::class, 'kirim']);