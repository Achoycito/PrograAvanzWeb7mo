<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar clientes</title>
</head>
<body>
    <h1>Mostrar clientes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo electronico</th>
                <th>Numero de telefono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td> {{ $client->id }} </td>
                    <td> {{ $client->name }} </td>
                    <td> {{ $client->email }} </td>
                    <td> {{ $client->phone_number }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>