<html>
    <head>
    </head>
    <body>
        <table>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Año</th>
                <th>Asistencias</th>
                <th>Condición</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->dni }}</td>
                    <td>{{ $student->firstname }}</td>
                    <td>{{ $student->lastname }}</td>

                    @switch($student->year)
                        @case('first')
                            <td>Primero</td>
                            @break
                        @case('second')
                            <td>Segundo</td>
                            @break
                        @case('third')
                            <td>Tercero</td>
                            @break 
                    @endswitch

                    <td>{{ $student->assists->count() }}</td>
                    <td>{{ $student->condition }}</td>
                </tr> 
            @endforeach
        </table>
    </body>
</html>