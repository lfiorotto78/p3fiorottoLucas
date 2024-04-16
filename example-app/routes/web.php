<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;



Route::get('/student', [StudentController::class, 'index'])->name('student.index');


Route::get(
    '/student/create',
    function () {
        return view('student/create');
    }
)->name('student.create');

Route::post('/student', [StudentController::class, 'store'])->name('student.store');


Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');

Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');


Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');