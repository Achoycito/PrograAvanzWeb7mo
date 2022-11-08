<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesion</title>
</head>
<body>
    
    <h1>{{ Auth::User()?->name }}</h1>
    <h5>Inicie sesion para continuar</h5>

    <form action="{{ url('login/') }}" method="post">
        @csrf
        <label for="email">Correo electronico</label>
        <input type="email" name="email" placeholder="ejemplo@gmail.com">
        <br>

        <label for="email">Contraseña</label>
        <input type="password" name="password" placeholder="">
        <br>

        <button type="submit">Aceptar</button>
    </form>
</body>
</html>