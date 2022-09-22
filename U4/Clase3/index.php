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
    
    <style>
        .bg-azul{
            background-color: #44f;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="bg-azul text-center">

                    <h3>Bienvenido a <br>Pollito Pio Producciones</h3>
                    <p>Inicie sesion para la oportunidad de su vida.</p>
                </div>
                <form action="products" method="get" class="form">
                    <div class="mb-3">
                        <label for="email">Correo electronico</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Contraseña">
                    </div>
                    <button class="btn btn-primary" type="submit">Acceder</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>