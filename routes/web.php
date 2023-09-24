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
  });

  Route::controller(TeacherController::class)->prefix('teacher')->group(function () {
    Route::get('/index', 'index')->name('teacher.index');
    Route::get('/create', 'create')->name('teacher.create');
    Route::post('/store', 'store')->name('teacher.store');
  });


  Route::controller(ClassAdvisoryController::class)->prefix('class-advisory')->group(function () {
    Route::get('/index', 'index')->name('classad.index');
    Route::get('/create', 'create')->name('classad.create');
    Route::post('/store', 'store')->name('classad.store');


  });

  Route::controller(ClassSubjectController::class)->prefix('class-sub')->group(function () {
    Route::get('/index', 'index')->name('classsub.index');
    Route::get('/create', 'create')->name('classsub.create');
    Route::get('/view', 'view')->name('classsub.view');
    Route::get('/set-grade', 'setGrade')->name('classsub.set-grade');

    Route::controller(GradeController::class)->prefix('grade-view')->group(function () {
      Route::get('/index', 'index')->name('grade.index');
    });

  });


});



?>
