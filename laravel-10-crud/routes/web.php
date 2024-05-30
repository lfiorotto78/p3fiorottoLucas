<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\ParameterController;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;

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

    //Alumnos//
    Route::resource('students', StudentController::class);
    Route::get('/students/filter/{year}', [StudentController::class, 'filter'])->name('students.filter');

    //Asistencias
    Route::post('/assists', [AssistController::class, 'store'])->name('assists.store');
    Route::get('/assists/{id}/show', [AssistController::class, 'show'])->name('assists.show');

    //Consulta
    Route::get('/consult', function () {
        return view('students.consult');
    })->name('students.consult');
    Route::post('/consult', [StudentController::class, 'search'])->name('students.search');

    //Parametros
    Route::get('/parameters', [ParameterController::class, 'index'])->name('parameters.index');
    Route::post('/parameters', [ParameterController::class, 'save'])->name('parameters.save');

    //PDF
    Route::get('/report/{year}', [PdfController::class, 'studentsReport'])->name('pdf.students');

    //Logs
    Route::get('/logs', [LogController::class, 'index'])->middleware('admin');
});

require __DIR__ . '/auth.php';

//Ejemplo middleware//
Route::get('/log', function () {
    return view('welcome');
})->middleware('log');
