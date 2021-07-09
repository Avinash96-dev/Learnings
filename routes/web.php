<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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
    return view('welcome');
});


// Route::get('/addstudent','StudentController@addStudent');
Route::get('/add-student',[StudentController::class, 'addStudent']);
Route::post('/add-student',[StudentController::class, 'createStudent'])->name('student.create');
Route::get('all-student',[StudentController::class,'displayStudent']);
Route::get('edit-student/{id}',[StudentController::class,'editStudent']);
Route::get('delete-student/{id}',[StudentController::class,'deleteStudent']);