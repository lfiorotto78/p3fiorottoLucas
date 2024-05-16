<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentSearchRequest;
use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('students.index', [
            'students' => Student::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): RedirectResponse
    {
        Student::create($request->all());
        return redirect()->route('students.index')
            ->withSuccess('New student is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        return view('students.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student): View
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->all());
        return redirect()->back()
            ->withSuccess('Student is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();
        return redirect()->route('students.index')
            ->withSuccess('Student is deleted successfully.');
    }


    public function condition($id)
    {
        $student = Student::find($id);
        $assistsQuantity = count($student->assists);

        $classesGiven = 15; //cantidad de clases dadas.
        
        $percentage = ($assistsQuantity * 100) / $classesGiven; //cálculo del porcentaje de asistencias.
        
        switch ($percentage) {
            case $percentage >= 80:
                return "Promoción";
            case $percentage >= 60 && $percentage < 80:
                return "Regular";
            case $percentage < 60:
                return "Libre";
        }
    }

    public function search(StudentSearchRequest $request)
    {
        try {
            $student = Student::where('dni', $request->dni)->firstOrFail();
        } catch (\Throwable $th) {
            return redirect()->back()->with('unexistent', 'No existe alumno con tal DNI');
        }

        return view('students.consult', [
            'student' => $student,
            'assists' => $student->assists->all(),
            'todayDate' => Carbon::now()->toDateString()
        ]);
    }

    public function birthday()
    {
        $studentsBirthDays = Student::where('birthdate', 'like', '%'.Carbon::now()->format('m-d'))->get();

        return view('dashboard', [
            'studentsBirthDays' => $studentsBirthDays
        ]);
    }
}
