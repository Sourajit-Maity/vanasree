<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\MomController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\Master\ServiceMasterController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SecurityQuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;

 

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

Route::get('/', [HomeController::class, 'index'])->name('welcome.home');
Route::get('/about', [HomeController::class, 'about'])->name('welcome.about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('welcome.gallery');

Route::redirect('admin','admin/login');

Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');

    //Cms Management
    Route::resource('cms', CmsController::class)->only(['index', 'edit']);

    Route::resources([
        'users' => UserController::class,
        'countries' => CountryController::class,
        'states' => StateController::class,
        'cities' => CityController::class,
        'languages' => LanguageController::class,
        'notice' => NoticeController::class,
        'moms' => MomController::class,
        'payments' => PaymentController::class,
        'security-question' => SecurityQuestionController::class,
        'gallery' => ServiceMasterController::class,

    ]);
});

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});