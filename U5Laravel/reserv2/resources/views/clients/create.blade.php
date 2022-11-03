<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cliente</title>
</head>
<body>
    <h1>Crear un cliente</h1>
    <form action="http://127.0.0.1:8000/clients" method="post">
        @csrf
        <label>Nombre</label>
        <input type="text" name="name" placeholder="Nombre completo">
        <br>

        <label>Correo electronico</label>
        <input type="email" name="email" placeholder="ejemplo@gmail.com">
        <br>

        <label>Numero de telefono</label>
        <input type="text" name="phone_number" placeholder="6120000000">
        <br>

        <button type="submit">Continuar</button>
    </form>
</body>
</html>