<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Students</title>
</head>
<body>
    <table>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Grupo</th>
        @foreach ($students as $student)
            <tr>
                <td>
                    {{ $student->nombre }}
                </td>
                <td>
                    {{ $student->apellido }}
                </td>
                <td>
                    {{ $student->grupo }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
