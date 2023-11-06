<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassSectionController;
use App\Http\Controllers\UserListcontroller;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ClassAdvisoryController;
use App\Http\Controllers\ClassSubjectController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\EnrollmentStatusController;

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

Route::middleware('guest')->group(function() {
  Route::get('/', [LoginController::class, 'login'])->name('login');
  Route::post('/verify', [LoginController::class, 'verifyUser'])->name('auth.verify');

});

Route::middleware('auth')->group(function() {
  Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

  Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

  Route::controller(ClassSectionController::class)->prefix('class-section')->group(function () {
    Route::get('/index', 'index')->name('class-section.index');
  });

  Route::controller(EnrollmentStatusController::class)->prefix('enrollment-stat')->group(function () {
    Route::get('/index', 'index')->name('enrollment-stat.index');
  });

  Route::controller(UserListcontroller::class)->prefix('user-list')->group(function () {
    Route::get('/index', 'index')->name('user-list.index');
  });

  Route::controller(AnnouncementController::class)->prefix('announcement')->group(function () {
    Route::get('/index', 'index')->name('announcement.index');
    Route::get('/create', 'create')->name('announcement.create');
    Route::post('/store', 'store')->name('announcement.store');
    Route::get('/edit/{ann}', 'edit')->name('announcement.edit');
    Route::get('/view/{ann}', 'view')->name('announcement.view');
    Route::put('/update/{ann}', 'update')->name('announcement.update');
  });

  Route::controller(EnrollmentController::class)->prefix('enrollment')->group(function () {
    Route::get('/index', 'index')->name('enrollment.index');
    Route::get('/create', 'create')->name('enrollment.create');
    Route::get('/view-application-list', 'viewApplicationList')->name('enrollment.view-app-list');

  });

  Route::controller(StudentController::class)->prefix('student')->group(function () {
    Route::get('/index', 'index')->name('student.index');
    Route::get('/create', 'create')->name('student.create');
    Route::post('/store', 'store')->name('student.store');
    Route::post('/extract', 'extract')->name('student.extract');

  });

  Route::controller(TeacherController::class)->prefix('teacher')->group(function () {
    Route::get('/index', 'index')->name('teacher.index');
    Route::get('/create', 'create')->name('teacher.create');
    Route::post('/store', 'store')->name('teacher.store');
  });


  Route::controller(ClassAdvisoryController::class)->prefix('class-advisory')->group(function () {
    Route::get('/index', 'index')->name('classad.index');
    Route::get('/class-student/{student}', 'classStudent')->name('classad.class-student');
    Route::post('/store', 'store')->name('classad.store');
    Route::post('/store-class-student', 'storeClassStudent')->name('classad.store-student');
    Route::post('/update/{classAd}', 'update')->name('classad.update');
    Route::get('/student-info/{student}', 'studentInfo')->name('classad.student-info');
    Route::get('/student-delete/{student}', 'deleteStudent')->name('classad.student-delete');


  });

  Route::controller(ClassSubjectController::class)->prefix('class-sub')->group(function () {
    Route::get('/index', 'index')->name('classsub.index');
    Route::get('/create', 'create')->name('classsub.create');
    Route::get('/view', 'view')->name('classsub.view');
    Route::get('/set-grade/{class}', 'setGrade')->name('classsub.set-grade');
    Route::post('/store', 'store')->name('classsub.store');
    Route::post('/set-grade-store', 'setGradeStore')->name('classsub.set-grade-store');
    Route::put('/set-grade-update', 'setGradeUpdate')->name('classsub.set-grade-update');


  });

  Route::controller(GradeController::class)->prefix('grade-view')->group(function () {
    Route::get('/index', 'index')->name('grade.index');
  });

});



?>
