<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubjectController;
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
    return redirect()->route('university');
});
// Route::view('/', 'user.register');


Route::get('/university', [UniversityController::class, 'list'])->name('university');
Route::get('/university/{university}', [UniversityController::class, 'front'])->name('university.front');
Route::get('/faculty/{faculty}', [FacultyController::class, 'front'])->name('faculty');
Route::get('/program/{program}', [ProgramController::class, 'front'])->name('program');
Route::get('/subject/{subject}', [SubjectController::class, 'front'])->name('subject');


Route::prefix('user')->name('user.')->group(function () {
    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');
    Route::match(['get', 'post'], '/register', [AdminController::class, 'register'])->name('register');
});

Route::middleware(['role:2'])->group(function () {
    Route::prefix('note')->group(function () {
        Route::match(['get', 'post'], '/add/{type}', [NoteController::class, 'add'])->name('note.add');
        Route::post('/file/add', [NoteController::class, 'fileAdd'])->name('file.upload');
    });
});

Route::middleware(['role:1'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
    });
    Route::prefix('admin')->group(function () {
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
        Route::prefix('subject')->name('subject.')->group(function () {
            Route::post('/submit', [SubjectController::class, 'submit'])->name('submit');
            Route::post('/update/{subject}', [SubjectController::class, 'update'])->name('update');
            Route::get('/delete/{subject}', [SubjectController::class, 'delete'])->name('delete');
        });
    });
});
Route::get('/data', function () {
    saveData();
});
