<x-app-layout>
    <div class="h-screen flex justify-center">
        <div class="flex flex-col">
            <div class="flex flex-row justify-center mt-5">
                <a href="{{ route('students.create') }}" class="px-2 py-1 rounded text-lg bg-blue-500 text-white">Registrar alumno</a>
            </div>
            
            <div class="flex flex-row justify-center">
                @if (Session::has('success'))
                    <p class="mt-5">{{ Session::get('success') }}</p>
                @endif
            </div>

            <div class="flex flex-row justify-start mt-5 mb-1">
                <a href="{{ route('students.index') }}" class="me-1 px-2 py-1 rounded text-sm bg-blue-500 text-white">Todos</a>
                
                <form action="{{ route('students.filter') }}" method="post">
                    @csrf

                    <button type="submit" name="year" value="first" class="px-2 py-1 rounded text-sm bg-blue-500 text-white">Primero</button>
                    <button type="submit" name="year" value="second" class="px-2 py-1 rounded text-sm bg-blue-500 text-white">Segundo</button>
                    <button type="submit" name="year" value="third" class="px-2 py-1 rounded text-sm bg-blue-500 text-white">Tercero</button>
                </form>
            </div>

            <div>
                @isset($students)
                    <table class="divide-y-4">
                        <thead>
                            <tr class="bg-blue-500 text-white">
                                <th scope="col" class="px-6 py-2 rounded-tl text-sm">DNI</th>
                                <th scope="col" class="px-6 py-2 text-sm">NOMBRE</th>
                                <th scope="col" class="px-6 py-2 text-sm">APELLIDO</th>
                                <th scope="col" class="px-6 py-2 text-sm">NACIMIENTO</th>
                                <th scope="col" class="px-6 py-2 text-sm">AÑO</th>
                                <th scope="col" class="px-6 py-2 rounded-tr text-sm">ACCIÓN</th>
                            </tr>
                        </thead>
                        @foreach ($students as $student)
                            <tbody>
                                <tr class="bg-white">
                                    <td class="p-2 rounded-b text-start">{{ $student->dni }}</td>
                                    <td class="p-2 text-start">{{ $student->firstname }}</td>
                                    <td class="p-2 text-start">{{ $student->lastname }}</td>
                                    <td class="p-2 text-start">{{ $student->birthdate }}</td>
                                    <td class="p-2 text-start">
                                        @switch($student->year)
                                            @case('first')
                                                Primero
                                                @break
                                            @case('second')
                                                Segundo
                                                @break
                                            @case('third')
                                                Tercero
                                                @break
                                        @endswitch
                                    </td>
                                    <td class="p-2 rounded-b text-center">
                                        <form action="{{ route('students.destroy', $student->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <a href="{{ route('students.show', $student->id) }}" class="text-sm text-blue-500 underline decoration-2">INFO</a>

                                            <a href="{{ route('students.edit', $student->id) }}" class="text-sm text-green-500 underline decoration-2">EDITAR</a>   

                                            <input type="submit" class="text-sm text-red-600 underline decoration-2" value="ELIMINAR" onclick="return confirm('Do you want to delete this student?');">

                                            <a href="{{ route('assists.show', $student->id) }}" class="text-sm text-yellow-500 underline decoration-2">ASISTENCIAS</a>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                @endisset
                @empty($students)
                    <p>No existen alumnos registrados</p>
                @endempty
            </div>
        </div>
    </div>
</x-app-layout>