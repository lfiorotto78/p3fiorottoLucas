<html>
    <body>
        <table>
            <tr>
                <th>ID Usuario</th>
                <th>Acción</th>
                <th>IP</th>
                <th>Navegador</th>
                <th>Fecha y Hora</th>
            </tr>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->user_id }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->ip }}</td>
                    <td>{{ $log->browser }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>