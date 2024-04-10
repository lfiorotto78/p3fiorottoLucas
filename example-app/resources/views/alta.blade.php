<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('insert')}}" method="post">
        @csrf

        <label for="dni_student">DNI:</label>
        <input type="number" name="dni" id="dni_student"> <br>

        <label for="nombre_student">Nombre:</label>
        <input type="text" name="nombre" id="nombre_student"> <br>

        <label for="apellido_student">Apellido:</label>
        <input type="text" name="apellido" id="apellido_student"> <br>

        <label for="nacimiento_student">Fecha de nacimiento:</label>
        <input type="date" name="nacimiento" id="nacimiento_student"> <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
