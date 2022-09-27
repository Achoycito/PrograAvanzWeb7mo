<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layout/head.php"; ?>
</head>
<body>
    
<?php include "../layout/header.php"; ?>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-lg-2 d-none d-sm-block">
                <?php include "../layout/sidebar.php"; ?>
            </div>
            <div class="col-lg-10 col-sm-12">
                <div class="row">
                    <div class="col-auto">
                        <h1>Productos</h1>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormProd">
                            Agregar producto
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="card col-5">
                        <img src="../public/img/img.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Producto</h5>
                            <p class="card-text">Descripcion de producto</p>
                            <a href="details.php" class="btn btn-info">Detalles</a>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalFormProd">Editar</a>
                            <a href="#" class="btn btn-danger" onclick="remove()">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL AGREGAR PRODUCTO -->
    <div class="modal fade" id="modalFormProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <script>
        function remove(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
        }
    </script>

    <?php include "../layout/scripts.php"; ?>
</body>
</html>