<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Teacher\ProfileController as TeacherProfileController;
use App\Http\Controllers\Teacher\TeacherHomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// User Section
Route::controller(HomeController::class)->name('user.')->group(function () {

    Route::middleware('auth')->controller(ProfileController::class)->group(function () {
        Route::get('/profile',  'edit')->name('profile.edit');
        Route::patch('/profile',  'update')->name('profile.update');
        Route::delete('/profile',  'destroy')->name('profile.destroy');
        Route::post('/profile/photo',  'updatePhoto')->name('profile.photo.update');
    });

    // Global user route [ 'guest' and 'auth ]
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/course', 'course')->name('course');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement');
});

// Admin Section
Route::prefix('/admin')->middleware(['auth', 'admin'])->controller(AdminHomeController::class)->name('admin.')->group(function () {
    Route::get('/', 'index')->name('index');
    // Profile
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/photo',  [AdminProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    // Teacher
    Route::prefix('/teacher')->controller(TeacherController::class)->name('teacher.')->group(function () {
        Route::get('/', 'index')->name('index');
        // Teacher Application
        // Route::prefix('application')->controller(TeacherApplicationController::class)->name('application.')->group(function () {
        //     Route::get('/', 'index')->name('index');
        // });
    });
    // Category
    Route::prefix('/category')->controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    // Announcements
    Route::prefix('/announcements')->controller(AdminAnnouncementController::class)->name('announcements.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{announcement}', 'show')->name('show');
        Route::get('/{announcement}/edit', 'edit')->name('edit');
        Route::put('/{announcement}', 'update')->name('update');
        Route::delete('/{announcement}', 'destroy')->name('destroy');
    });
});

// Teacher Section
Route::prefix('/teacher')->middleware(['auth', 'teacher'])->controller(TeacherHomeController::class)->name('teacher.')->group(function () {
    Route::get('/', 'index')->name('index');
    // Profile
    Route::get('/profile', [TeacherProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/photo',  [TeacherProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    // Course
    Route::prefix('/course')->middleware(['auth', 'teacher'])->controller()->name('course.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

require __DIR__ . '/auth.php';
