<x-layout>
    <table>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Nacimiento</th>
        <th>Grupo</th>
        <th>Acciones</th>
        @foreach ($students as $student)
            <tr>
                <td>
                    {{ $student->dni }}
                </td>
                <td>
                    {{ $student->name }}
                </td>
                <td>
                    {{ $student->lastname }}
                </td>
                <td>
                    {{ $student->birthdate }}
                </td>
                <td>
                    {{ $student->group }}
                </td>
                <td>
                    <a href="{{ route('student.edit', $student->id) }}">Modificar</a>

                    <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-layout>
