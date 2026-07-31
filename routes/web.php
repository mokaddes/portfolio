<?php

use App\Http\Controllers\Admin\AiProviderController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PersonalQualityController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ToolController;
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
Route::get('/projects', [FrontendController::class, 'projectsIndex'])->name('projects.index');
Route::get('/projects/{id}', [FrontendController::class, 'show'])->name('projects.show');
Route::get('/study-cases/{project:slug}', [FrontendController::class, 'projectStudyCase'])->name('projects.study-case');
Route::get('/blog', [FrontendController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{blog:slug}', [FrontendController::class, 'blogShow'])->name('blog.show');
Route::get('/resume', [FrontendController::class, 'resume'])->name('resume');
// routes/web.php — near your existing resume route
Route::get('/resume/download', [FrontendController::class, 'resumeDownload'])->name('resume.download');

Route::get('/image', [ImageProcessingController::class, 'index']);
Route::post('/image/store', [ImageProcessingController::class, 'store'])->name('image.store');

Route::get('ai', [HomeController::class, 'ai'])->name('ai.index');

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
        Route::get('/{project}/gallery', [GalleryController::class, 'index'])->name('gallery');
        Route::post('/{project}/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/gallery/{gallery}/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
    });
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::post('/store', [CategoryController::class, 'store'])->name('store');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('/delete/{category}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'tools', 'as' => 'tool.'], function () {
        Route::get('/', [ToolController::class, 'index'])->name('index');
        Route::post('/store', [ToolController::class, 'store'])->name('store');
        Route::post('/{tool}/update', [ToolController::class, 'update'])->name('update');
        Route::get('/{tool}/delete', [ToolController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'skills', 'as' => 'skill.'], function () {
        Route::get('/', [SkillController::class, 'index'])->name('index');
        Route::post('/store', [SkillController::class, 'store'])->name('store');
        Route::post('/{skill}/update', [SkillController::class, 'update'])->name('update');
        Route::get('/{skill}/delete', [SkillController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'personal-qualities', 'as' => 'personal-quality.'], function () {
        Route::get('/', [PersonalQualityController::class, 'index'])->name('index');
        Route::post('/store', [PersonalQualityController::class, 'store'])->name('store');
        Route::post('/{personalQuality}/update', [PersonalQualityController::class, 'update'])->name('update');
        Route::get('/{personalQuality}/delete', [PersonalQualityController::class, 'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'educations', 'as' => 'education.'], function () {
        Route::get('/', [EducationController::class, 'index'])->name('index');
        Route::post('/store', [EducationController::class, 'store'])->name('store');
        Route::post('/{education}/update', [EducationController::class, 'update'])->name('update');
        Route::get('/{education}/delete', [EducationController::class, 'destroy'])->name('delete');
    });

    Route::group(['prefix' => 'blogs', 'as' => 'blog.'], function () {
        Route::get('/', [BlogController::class, 'index'])->name('index');
        Route::post('/store', [BlogController::class, 'store'])->name('store');
        Route::post('/{blog}/update', [BlogController::class, 'update'])->name('update');
        Route::get('/{blog}/delete', [BlogController::class, 'destroy'])->name('delete');
        Route::post('/{blog}/generate-topics', [BlogController::class, 'generateTopics'])->name('generate-topics');
        Route::post('/create-with-ai', [BlogController::class, 'createWithAi'])->name('create-with-ai');
    });
    Route::group(['prefix' => 'ai-providers', 'as' => 'ai-provider.'], function () {
        Route::get('/', [AiProviderController::class, 'index'])->name('index');
        Route::post('/store', [AiProviderController::class, 'store'])->name('store');
        Route::post('/{aiProvider}/update', [AiProviderController::class, 'update'])->name('update');
        Route::get('/{aiProvider}/delete', [AiProviderController::class, 'destroy'])->name('delete');
        Route::get('/{aiProvider}/toggle-active', [AiProviderController::class, 'toggleActive'])->name('toggle-active');
    });

    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('index');
        Route::put('/update', [SettingsController::class, 'update'])->name('update');
    });

    Route::get('visitors', [HomeController::class, 'visitors'])->name('visitors');
    Route::get('visitor/block', [HomeController::class, 'ipBlock'])->name('visitors.block');
});
Route::get('visitor/device', [HomeController::class, 'deviceToken'])->name('notification.save-token');


