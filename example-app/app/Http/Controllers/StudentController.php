<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        $grupoA = DB::table('students')
            ->select('*')
            ->where('grupo', '=', 'A')
            ->get();

        return view('student', ['students'=> $grupoA]);
    }

    public function insert(Request $request) {
        $student = Student::create([
            'dni' => $request->dni,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->nacimiento,
        ]);

        /*$student = new Student();
        $student->name = $request->nombre;
        $student->save();*/

        //$student = Student::create($request->all());

        return redirect('/alta');
    }

    public function delete($id) {
        /*$students = Student::all();
        $student = $students->find($id);
        $student->delete();*/
    }
}
