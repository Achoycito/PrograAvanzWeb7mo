<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso al panel</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <!-- <link rel="stylesheet" href="public/css/main.css"> -->
    
</head>
<body>
    <!-- <div class="container">
        <h1 class="font-bold text-2xl">Inicio de sesion</h1>
        <input type="email" class="form-control block w-full px-4 py-2 text-xl font-normal text-blue-500 bg-clip-padding border border-solid border-black rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
    </div> -->

    <div class="container my-4">
        <div class="row g-6">

            <div class="text-center">
                <h1>Bienvenido, usuario</h1>
                <p>Para acceder al contenido, necesita primero iniciar sesion</p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <h1>Inicio de sesion</h1>
                <form>
                <div class="mb-3">
                    <label class="form-label">Correo electronico</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Recordarme</label>
                </div>
                <button type="submit" class="btn btn-info">Entrar</button>
                </form>
            </div>
            <div class="col-6">
                <h1>Registro</h1>
                <form>
                <div class="mb-3">
                    <label class="form-label">Correo electronico</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Acepto los <a href="" class="text-info">terminos y condiciones</a></label>
                </div>
                <button type="submit" class="btn btn-info">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>