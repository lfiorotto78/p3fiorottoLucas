<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Assist;
use App\Models\Student;

class AssistController extends Controller
{
    public function show($id)
    {
        $student = Student::find($id);
    
        return view('assists.show', [
            'student' => $student,
            'assists' => $student->assists
        ]);
    }
    
    public function store(Request $request): RedirectResponse
    {
        $assist = new Assist;
        $assist->student_id = $request->id;
        $assist->save();

        return redirect()->route('students.consult')
            ->withSuccess('Asistencia cargada con éxito');
    }
}
