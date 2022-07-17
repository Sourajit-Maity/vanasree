<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\MomController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\Master\ServiceMasterController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SecurityQuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\FaqpageController;
use App\Http\Controllers\Admin\ContactuspageController;
use App\Http\Controllers\Admin\AboutpageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\ForgotPasswordController;


 

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
Route::get('/gallery-details/{gallery_name_slug}', [HomeController::class, 'gallery_details'])->name('welcome.gallery-details');
Route::get('/contact', [HomeController::class, 'contact'])->name('welcome.contact');


Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::post('contact-submit', [HomeController::class, 'contactUsSubmit'])->name('welcome.contact-submit');
Route::post("login-client", [HomeController::class, 'loginClient'])->name('welcome.login-client');
Route::get('logout-client', [HomeController::class, 'logoutClient'])->name('welcome.logout-client');
Route::redirect('admin','admin/login');

Route::get('my-account', [HomeController::class, 'myAccount'])->name('welcome.my-account');
Route::get('edit-account', [HomeController::class, 'editAccount'])->name('welcome.edit-account');
Route::post('update-account', [HomeController::class, 'updateAccount'])->name('welcome.update-account');
Route::get('/minutes-of-meeting', [HomeController::class, 'minutes_of_meeting'])->name('welcome.minutes-of-meeting');
Route::get('/circular-notice', [HomeController::class, 'circular_notice'])->name('welcome.circular-notice');
Route::get('change-password', [HomeController::class, 'changePassword'])->name('welcome.change-password');
Route::post('update-password', [HomeController::class,'updatePassword'])->name('update-password');


Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');

    //Cms Management
    Route::resource('cms', CmsController::class)->only(['index', 'edit']);
    Route::get('/create-design/{gallery}', [ServiceMasterController::class, 'createdesign'])->name('gallery.create-design');
    
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
        'homepage' => HomepageController::class,
        'faqpage' => FaqpageController::class,
        'contactuspage' => ContactuspageController::class,
        'aboutpage' => AboutpageController::class,
        'pages' => CmsController::class,
        'contact-form' => ContactController::class,

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