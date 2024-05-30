<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function studentsReport($year)
    {
        if ($year == 'all') {
            $students = Student::all();
        } else {
            $students = Student::where('year', $year)->get();
        }
       
        foreach ($students as $student) {
            $student->condition = StudentController::getCondition($student);
        }

        $pdf = Pdf::loadView('pdf.students', ['students' => $students]);
        return $pdf->stream();
    }
}
