<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('student.index', ['students' => $students]);
    }

    public function store(Request $request)
    {
        $student = new Student();
        $student->dni = $request->dni;
        $student->name = $request->name;
        $student->lastname = $request->lastname;
        $student->birthdate = $request->birthdate;
        $student->save();

        return to_route('student.index');
    }

    public function edit($id)
    {
        $students = Student::all();
        $student = $students->find($id);
        return view('student.edit', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $students = Student::all();
        $student = $students->find($id);
        $student->update([
            'dni' => $request->dni,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
        ]);

        return to_route('student.index');
    }

    public function destroy($id)
    {
        $students = Student::all();
        $student = $students->find($id);
        $student->delete();

        return to_route('student.index');
    }
}
