<?php

use App\Http\Controllers\ImageProcessingController;
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

Route::get('/', function () {
    return view('portfolio');
});

Route::get('/image', [ImageProcessingController::class ,'index']);
Route::post('/image/store', [ImageProcessingController::class ,'store'])->name('image.store');
