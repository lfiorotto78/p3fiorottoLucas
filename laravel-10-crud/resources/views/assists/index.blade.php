<x-app-layout>
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif

    <div>
        <form action="{{ route('assists.store') }}" method="post">
            @csrf
            
            <label for="dni">DNI del alumno: </label>
            <input type="number" name="dni" id="dni"> <br>
            <button type="submit">Registrar asistencia</button>
        </form>
    </div>
</x-app-layout>