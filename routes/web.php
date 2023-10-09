<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserroleController;
use App\Http\Controllers\ImportUsersController;
use App\Models\course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    $coures = course::all();
    return view('dashboard',compact('coures'));
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', function () {
    $coures = course::all();
    return view('dashboard',compact('coures'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/course/create', [CourseController::class, 'create'])->name('dashboard.create');
    Route::post('/course/edit', [CourseController::class, 'courseEdit'])->name('dashboard.courseEdit');
    Route::post('/course/addStudent', [CourseController::class, 'Addstd'])->name('dashboard.Addstd');
    Route::post('/course/updateStudent', [CourseController::class, 'EditStd'])->name('dashboard.EditStd');
    Route::get('/course/delete/{id}',[CourseController::class,'delete'])->name('dashboard.delete');
    Route::get('/course/deleteStudent/{id}',[CourseController::class,'DelStd'])->name('dashboard.DelStd');
    Route::get('/course/homework/{id}',[CourseController::class,'homework'])->name('dashboard.homework');
    Route::get('/course/detail/{id}',[CourseController::class,'courseDetail'])->name('dashboard.courseDetail');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/import/excel', 'ExcelController@import')->name('import.excel');

});

Route::get('/roles', [UserroleController::class, "index"]);
Route::get('/myweb', [UserroleController::class, "myweb"]);
Route::get('/students',[StudentsController::class, "index"]);
Route::get('/importuser',[ImportUsersController::class, "importuser"]);


