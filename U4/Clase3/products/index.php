<?php include "../app/ProductController.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layout/head.php"; ?>
    <title>Todos los productos</title>
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
                    <?php foreach($arrayProducts as $product){?>
                        <div class="card col-3">
                            <img src="<?php echo $product->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product->name; ?></h5>
                                <p class="text-muted">
                                    <?php
                                    if($product->brand!=null){
                                        echo $product->brand->name;
                                    } else{
                                        echo "Sin marca";
                                    } ?>
                                </p>
                                <a href="details.php" class="btn btn-info">Detalles</a>
                                <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalFormProd">Editar</a>
                                <a href="#" class="btn btn-danger" onclick="remove()">Eliminar</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL AGREGAR PRODUCTO -->
    <div class="modal fade" id="modalFormProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../app/ProductController.php" method="post" class="form">

                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre del producto">
                        </div>
                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Slug del producto">
                        </div>
                        <div class="mb-3">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion del producto">
                        </div>
                        <div class="mb-3">
                            <label>Caracteristicas</label>
                            <input type="text" class="form-control" name="caracteristicas" placeholder="Caracteristicas del producto">
                        </div>
                        <div class="mb-3">
                            <label>ID de la marca</label>
                            <input type="number" class="form-control" name="idmarca" placeholder="ID de la marca">
                        </div>

                        <input type="hidden" name="action" value="create">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
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