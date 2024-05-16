<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\ProductController;

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

//Breeze - Login//
Route::get('/dashboard', [StudentController::class, 'birthday'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //CRUD Alumnos//
    Route::resource('students', StudentController::class);

    //Asistencias
    Route::post('/assists', [AssistController::class, 'store'])->name('assists.store');
    Route::get('/assists/{id}/show', [AssistController::class, 'show'])->name('assists.show');

    //Consulta
    Route::get('/consult', function () {
        return view('students.consult');
    })->name('students.consult');
    Route::post('/consult', [StudentController::class, 'search'])->name('students.search');
});

require __DIR__ . '/auth.php';

//Ejemplo middleware//
Route::get('/log', function () {
    return view('welcome');
})->middleware('log');
