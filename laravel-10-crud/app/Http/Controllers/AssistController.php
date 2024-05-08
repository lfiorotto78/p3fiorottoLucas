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
        $student = DB::table('students')->select('id')->where('dni', '=', $request->dni)->get();
        DB::table('assists')->insert(['student_id' => $student[0]->id]);
    }
}
