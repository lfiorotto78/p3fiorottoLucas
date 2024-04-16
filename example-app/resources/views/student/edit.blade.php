<x-layout>
    <x-layout>
        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="student_dni">DNI:</label>
            <input type="number" name="dni" id="student_dni" value="{{ $student->dni }}"> <br>

            <label for="student_name">Nombre:</label>
            <input type="text" name="name" id="student_name" value="{{ $student->name }}"> <br>

            <label for="student_lastname">Apellido:</label>
            <input type="text" name="lastname" id="student_lastname" value="{{ $student->lastname }}"> <br>

            <label for="student_birthdate">Fecha de nacimiento:</label>
            <input type="date" name="birthdate" id="student_birthdate" value="{{ $student->birthdate }}"> <br>

            <input type="submit" value="Enviar">
        </form>
    </x-layout>
</x-layout>
