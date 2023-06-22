<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Teacher
use App\Http\Controllers\backend\TeachersController;
use App\Http\Controllers\backend\StudentsController;
use App\Http\Controllers\backend\ClassesController;
use App\Http\Controllers\backend\AssignmentController;
use App\Http\Controllers\backend\SubmittedAssignmentTeacherController;

//Student
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\AssignmentStudentController;
use App\Http\Controllers\backend\SubmittedAssignmentStudentController;
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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('teacher')->middleware(['auth','isTeacher'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'teacherindex'])->name('teacher.dashboard');
    Route::resource('teacher', TeachersController::class)->names('teacher');
    Route::resource('student', StudentsController::class)->names('student');
    Route::resource('class', ClassesController::class)->names('class');
    Route::resource('assignment', AssignmentController::class)->names('assignment');
    Route::resource('assignment-submitted-teacher', SubmittedAssignmentTeacherController::class)->names('teacher.submitted.assignment');
});

Route::prefix('student')->middleware(['auth','isStudent'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'studentindex'])->name('student.dashboard');
    Route::resource('assignment-all', AssignmentStudentController::class)->names('student.assignment');
    Route::resource('assignment-submitted', SubmittedAssignmentStudentController::class)->names('student.submitted.assignment');
});

