<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('dashboard');
});

// Students
Route::resource('students', StudentController::class)
    ->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);

// Courses
Route::get('/courses', [CourseController::class, 'index'])
    ->name('courses.index');

Route::get('/courses/{code}', [CourseController::class, 'show'])
    ->name('courses.show');

// Settings
Route::get('/settings', [SettingsController::class, 'index'])
    ->name('settings.index');