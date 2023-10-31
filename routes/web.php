<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
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
Route::get('mailtemplate', [MailController::class, 'basic_email']);
Route::get('sendhtmlemail', [MailController::class, 'html_email']);
Route::get('mailtemplatecc', [SmecMailController::class, 'tampilan']);
Route::get('sendmailcc', [SmecMailController::class, 'kirim']);
