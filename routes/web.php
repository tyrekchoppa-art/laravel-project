<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ClassroomController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/about', [AboutController::class, 'index'])->name('admin.about');

Route::prefix('admin')->group(function () {
    Route::get('/student', [StudentController::class, 'index'])->name('admin.student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('admin.student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('admin.student.store');
    Route::get('/classroom', [ClassroomController::class, 'index'])->name('admin.classroom.index');
    Route::post('/classroom', [ClassroomController::class, 'store'])->name('admin.classroom.store');
    Route::get('/teacher', [TeacherController::class, 'index'])->name('admin.teacher.index');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('admin.teacher.store');
    Route::get('/subject', [SubjectController::class, 'index'])->name('admin.subject.index');
    Route::post('/subject', [SubjectController::class, 'store'])->name('admin.subject.store');
});
