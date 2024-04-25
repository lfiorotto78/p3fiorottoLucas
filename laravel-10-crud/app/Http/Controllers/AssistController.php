<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Student;

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
}
