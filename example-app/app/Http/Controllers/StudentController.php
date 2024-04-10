<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index() {
        $grupoA = DB::table('students')
            ->select('*')
            ->where('grupo', '=', 'A')
            ->get();

        return view('student', ['students'=> $grupoA]);
    }

    public function insert() {
        dd('Hola');
    }
}
