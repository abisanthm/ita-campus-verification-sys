<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DisabledController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramtypeController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\CerSettingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserLogController;
use Illuminate\Support\Facades\Storage;

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

Route::middleware('checkAuth')->group(function () {
    Auth::routes();
    Route::get('/', [VerifyController::class, 'index'])->name('verify');
    Route::post('/verify-certificate', [VerifyController::class, 'verifyCertificate'])->name('verify-certificate');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('admin');

    Route::get('/settings/mail-config', [SettingController::class, 'showMailConfigForm'])->name('mail-config');
    Route::put('/settings/mail-config', [SettingController::class, 'updateEnv'])->name('mail-config.update');
    Route::get('/settings/verification-config', [SettingController::class, 'showVerificationConfigForm'])->name('verification-config');
    Route::put('/settings/verification-config/{id}', [SettingController::class, 'updateVerification'])->name('verification-config.update');


    Route::post('/upload-image', [ImageUploadController::class, 'upload'])->name('upload-image')->middleware('web');
    Route::get('/fetch-programs/{programTypeId}', 'App\Http\Controllers\ProgramController@fetchPrograms')->name('fetchPrograms');
    Route::get('search-courses', [ProgramController::class, 'search']);
});


Route::middleware(['checkAuth'])->group(function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('students', StudentController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('program-types', ProgramtypeController::class);
    Route::resource('verify', VerifyController::class);
    Route::resource('values', ValueController::class);
    Route::resource('user-logs', UserLogController::class);

});




