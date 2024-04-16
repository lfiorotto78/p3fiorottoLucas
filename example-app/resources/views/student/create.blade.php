<x-layout>
    <form action="{{ route('student.store') }}" method="POST">
        @csrf

        <label for="student_dni">DNI:</label>
        <input type="number" name="dni" id="student_dni"> <br>

        <label for="student_name">Nombre:</label>
        <input type="text" name="name" id="student_name"> <br>

        <label for="student_lastname">Apellido:</label>
        <input type="text" name="lastname" id="student_lastname"> <br>

        <label for="student_birthdate">Fecha de nacimiento:</label>
        <input type="date" name="birthdate" id="student_birthdate"> <br>

        <input type="submit" value="Enviar">
    </form>
</x-layout>
