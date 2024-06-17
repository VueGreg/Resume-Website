<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\FileDownloadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/{any}', function () {return view('welcome');})->where('any', '.*');

Route::post('/mail', [EmailController::class, 'store']);

Route::get('/download-cv', [FileDownloadController::class, 'download']);