<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SmecMailController;
use App\Http\Controllers\SmecLokalController;

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
Route::get('downloadexcel',[MailController::class,'download_excel']);

Route::get('smeclokaltemplate',[SmecLokalController::class,'index']);

Route::get('mailexcel/{sales}', [SmecMailController::class, 'tampilan']);
