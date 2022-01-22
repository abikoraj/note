<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('admin.login');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register', [AdminController::class, 'register'])->name('register');
});

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::prefix('university')->name('university.')->group(function () {
        Route::get('/', [UniversityController::class, 'index'])->name('index');
        Route::post('/submit', [UniversityController::class, 'submit'])->name('submit');
        Route::post('/update/{university}', [UniversityController::class, 'update'])->name('update');
        Route::get('/delete/{university}', [UniversityController::class, 'delete'])->name('delete');
        Route::get('/{university}', [UniversityController::class, 'view'])->name('view');
    });

    Route::prefix('faculty')->name('faculty.')->group(function () {
        Route::post('/submit', [FacultyController::class, 'submit'])->name('submit');
        Route::post('/update/{faculty}', [FacultyController::class, 'update'])->name('update');
        Route::get('/delete/{faculty}', [FacultyController::class, 'delete'])->name('delete');
        Route::get('/{faculty}', [FacultyController::class, 'view'])->name('view');
    });

    Route::prefix('program')->name('program.')->group(function () {
        Route::post('/submit', [ProgramController::class, 'submit'])->name('submit');
        Route::post('/update/{program}', [ProgramController::class, 'update'])->name('update');
        Route::get('/delete/{program}', [ProgramController::class, 'delete'])->name('delete');
        Route::get('/{program}', [ProgramController::class, 'view'])->name('view');
    });
});
