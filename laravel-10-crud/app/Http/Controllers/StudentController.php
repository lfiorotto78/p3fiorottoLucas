<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentSearchRequest;
use App\Models\Student;
use App\Models\Parameter;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'students' => Student::all()
        ]);
    }

    public function filter(Request $request): View
    {
        return view('students.index', [
            'students' => Student::where('year', $request->year)->get()
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
        
        return redirect()->route('students.index')->withSuccess('Alumno registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): View
    {
        $condition = $this->getCondition($student);

        return view('students.show', [
            'student' => $student,
            'condition' => $condition
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


    public static function getCondition($student)
    {
        $assistsQuantity = count($student->assists);
        
        $parameters = Parameter::all()->last();

        if (empty($parameters)) {
            return 'PARAMETROS NO ESTABLECIDOS';
        }

        $classesQuantity = $parameters->classes_quantity;
        $promotionPercentage = $parameters->promotion_percentage;
        $regularPercentage = $parameters->regular_percentage;
        
        $percentage = ($assistsQuantity * 100) / $classesQuantity;
        
        if ($percentage >= $promotionPercentage) {
            return 'Promoción';
        }

        if ($percentage >= $regularPercentage && $percentage < $promotionPercentage) {
            return 'Regular';
        }

        if ($percentage < $regularPercentage) {
            return 'Libre';
        }
    }

    public function search(StudentSearchRequest $request)
    {
        try {
            $student = Student::where('dni', $request->dni)->firstOrFail();
        } catch (\Throwable $th) {
            return redirect()->back()->with('unexistent', 'No existe alumno con tal DNI')->withInput();
        }

        return view('students.consult', [
            'student' => $student,
            'lastAssist' => $student->assists->last()
        ]);
    }

    public function birthday()
    {
        $students = Student::where('birthdate', 'like', '%'.Carbon::now()->format('m-d'))->orderBy('lastname')->get();
        //Carbon::parse($student->birthdate)->isBirthday(Carbon::now())

        return view('dashboard', [
            'students' => $students
        ]);
    }
}
