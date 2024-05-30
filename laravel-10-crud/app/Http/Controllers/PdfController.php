<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function allStudentsReport()
    {
        $students = Student::all();
        
        foreach ($students as $student) {
            $student->condition = StudentController::getCondition($student);
        }

        $pdf = Pdf::loadView('pdf.students', ['students' => $students]);
        return $pdf->stream();
    }
}
