<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageProcessingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/projects/{id}', [FrontendController::class, 'show'])->name('projects.show');

Route::get('/image', [ImageProcessingController::class, 'index']);
Route::post('/image/store', [ImageProcessingController::class, 'store'])->name('image.store');

Route::get('ai', [HomeController::class, 'ai'])->name('ai.index');
Route::get('ai/writing-assist', [HomeController::class, 'writingAssist'])->name('ai.writing-assist');

Route::post('contact', [HomeController::class, 'contact'])->name('contact');

// register false routes
Auth::routes(['register' => false]);


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'projects', 'as' => 'project.'], function () {
        Route::get('/', [ProjectController::class, 'index'])->name('index');
        Route::post('/store', [ProjectController::class, 'store'])->name('store');
        Route::post('/{project}/update/', [ProjectController::class, 'update'])->name('update');
        Route::get('/{project}/delete/', [ProjectController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::get('visitors', [HomeController::class, 'visitors'])->name('visitors');
    Route::get('visitor/block', [HomeController::class, 'ipBlock'])->name('visitors.block');
});
Route::get('visitor/device', [HomeController::class, 'deviceToken'])->name('notification.save-token');


