<x-app-layout>
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">Student List</div>
                <div class="card-body">
                    <a href="{{ route('students.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Student</a>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">DNI</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Fecha de nacimiento</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->dni }}</td>
                                <td>{{ $student->firstname }}</td>
                                <td>{{ $student->lastname }}</td>
                                <td>{{ $student->birthdate }}</td>
                                <td>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this student?');"><i class="bi bi-trash"></i> Delete</button>

                                        <a href="{{ route('assists.show', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Asistencias</a>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>No Student Found!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $students->links() }}

                </div>
            </div>
        </div>    
    </div>
</x-app-layout>
