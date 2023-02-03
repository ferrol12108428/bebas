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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'index'])->name('index');

// Route Create
Route::get('/create', [StudentController::class, 'create'])->name('create');
Route::post('/storeCreate', [StudentController::class, 'store'])->name('storeData');

//Route Edit
Route::get('/editData/{id}', [StudentController::class, 'edit'])->name('editData');
Route::patch('/updateData/{id}', [StudentController::class, 'update'])->name('updateData');

//Route Delete
Route::post('/deleteData/{id}', [StudentController::class, 'destroy'])->name('deleteData');

