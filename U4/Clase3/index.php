<?php include_once "app/config.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "layout/head.php";?>
    <title>Acceso al panel</title>
</head>
<body>

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="bg-azul text-center">

                    <h3>Bienvenido a <br>Pollito Pio Producciones</h3>
                    <p>Inicie sesion para la oportunidad de su vida.</p>
                </div>
                <form action="<?= BASE_PATH?>auth" method="post" class="form">
                    <div class="mb-3">
                        <label for="email">Correo electronico</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                    </div>
                    <input type="hidden" name="action" value="access">
                    <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token'] ?>">
                    <button class="btn btn-primary" type="submit">Acceder</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>