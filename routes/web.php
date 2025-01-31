<?php

use App\Http\Controllers\ClinicReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('login', [LoginController::class, 'index']);


Route::group(['middleware' => 'auth'], function () {
    
    Route::get('/', function() {
        return redirect()->route('dashboard');
    });

    Route::get('admins', [UserController::class, 'index'])->name('users.index');
    Route::get('admins/create', [UserController::class, 'create'])->name('users.create');
    Route::post('admins', [UserController::class, 'store'])->name('users.store');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('students', StudentController::class);
    Route::get('student/qr/{student}', [StudentController::class, 'showQR'])->name('studentQR.show');

    Route::get('clinical-reports', [ClinicReportController::class, 'index'])->name('clinical-reports.index');
    Route::get('clinical-reports/{student}', [ClinicReportController::class, 'show'])->name('clinical-reports.show');
    Route::post('clinical-reports', [ClinicReportController::class, 'store'])->name('clinical-reports.store');
    
    Route::patch('archives/{student}', [StudentController::class, 'archive'])->name('students.archive');
    Route::patch('archives/{student}/remove', [StudentController::class, 'removeArchive'])->name('students.archive.remove');
    Route::get('archives', [StudentController::class, 'archiveTable'])->name('archive');
    Route::get('high-risk', [StudentController::class, 'highRisk'])->name('high-risk');
});
