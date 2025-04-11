<?php

use App\Http\Controllers\ClinicReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRegistration;
use App\Http\Middleware\CheckSuperAdmin;
use Illuminate\Support\Facades\Route;

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::view('success', 'success')->name('success');

Route::post('clinical-reports', [ClinicReportController::class, 'store'])->name('clinical-reports.store');
Route::get('test-email', [EmailController::class, 'sendTestEmail']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::middleware([CheckSuperAdmin::class])->group(function () {
        Route::get('admins', [UserController::class, 'index'])->name('users.index');
        Route::get('admins/create', [UserController::class, 'create'])->name('users.create');
        Route::get('admins/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('admins/{user}', [UserController::class, 'update'])->name('users.update');
        Route::post('admins', [UserController::class, 'store'])->name('users.store');
        Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('reset-password/{user}', [UserController::class, 'resetPassword'])->name('reset-password');
        Route::get('maintenance', [MaintenanceController::class, 'index'])->name('maintenance.index');
        Route::patch('maintenance/{maintenance}', [MaintenanceController::class, 'update'])->name('maintenance.update');
    });

    Route::get('change-password', [UserController::class, 'changePasswordForm'])->name('change-pass.create');
    Route::post('change-password', [UserController::class, 'changePassword'])->name('change-pass.update');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('students', StudentController::class)->except(['show']);
    Route::get('student/qr/{student}', [StudentController::class, 'showQR'])->name('studentQR.show');

    Route::get('clinical-reports', [ClinicReportController::class, 'index'])->name('clinical-reports.index');
    Route::get('clinical-reports/{student}', [ClinicReportController::class, 'show'])->name('clinical-reports.show');
    Route::get('clinical-reports/{clinicReport}/edit', [ClinicReportController::class, 'edit'])->name('clinical-reports.edit');
    Route::patch('clinical-report/{clinicReport}', [ClinicReportController::class, 'update'])->name('clinical-reports.update');
    Route::get('clinic-report/export/{student}', [ClinicReportController::class, 'export'])->name('clinical-report.export');


    Route::patch('archives/{student}', [StudentController::class, 'archive'])->name('students.archive');
    Route::patch('archives/{student}/remove', [StudentController::class, 'removeArchive'])->name('students.archive.remove');
    Route::get('archives', [StudentController::class, 'archiveTable'])->name('archive');
    Route::get('high-risk', [StudentController::class, 'highRisk'])->name('high-risk');
    Route::get('high-risk/{student}', [StudentController::class, 'highRiskShow'])->name('high-risk.show');
});



Route::get('students/{code}', [StudentController::class, 'show'])->name('students.show');

Route::get('students/{code}', [StudentController::class, 'show'])->name('students.show');

Route::middleware([CheckRegistration::class])->group(function () {
    Route::get('student/register', [StudentController::class, 'register'])->name('register');
    Route::post('student/register', [StudentController::class, 'registerStudent'])->name('register.student');
    Route::view('submitted', 'students.submitted')->name('submitted');
});