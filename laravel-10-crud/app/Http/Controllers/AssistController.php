<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AssistController extends Controller
{
    public function show($id)
    {
        $student = Student::find($id);
        $assists = $student->assists;
    
        return view('assists.show', [
            'student' => $student,
            'assists' => $assists
        ]);
    }
    
    public function store(Request $request)
    {
        $student = Student::firstWhere('dni', $request->dni);

        $assist = new Assist;
        $assist->student_id = $student->id;
        $assist->save();
    }
}
