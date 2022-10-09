<?php include "../app/ProductController.php"; ?>
<?php include "../app/BrandController.php"; ?>

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
                        <button onclick="setInputOculto('create')" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormProd">
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
                                <a href="<?= BASE_PATH."product/".$product->slug ?>" class="btn btn-info">Detalles</a>
                                <button onclick="setupModalToEdit(this)" data-product='<?php echo json_encode($product);?>' class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalFormProd">Editar</button>
                                <button onclick="remove(<?php echo $product->id; ?>)" class="btn btn-danger">Eliminar</button>
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
                    <form enctype="multipart/form-data" action="<?= BASE_PATH?>prod" method="post" class="form">

                        <div class="mb-3">
                            <label>Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto">
                        </div>
                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug del producto">
                        </div>
                        <div class="mb-3">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion del producto">
                        </div>
                        <div class="mb-3">
                            <label>Caracteristicas</label>
                            <input type="text" class="form-control" id="caracteristicas" name="caracteristicas" placeholder="Caracteristicas del producto">
                        </div>
                        <div class="mb-3">
                            <label>Marca</label>
                            <select id="marca" name="marca" class="form-select" required>
                                <?php foreach($arrayBrands as $brand){ ?>
                                    <option value="<?php echo $brand->id; ?>" class="dropdown-item"><?php echo $brand->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Imagen del producto</label>
                            <input type="file" name="imgproducto" class="form-control">
                        </div>

                        <input id="id" type="hidden" name="id">
                        <input type="hidden" name="global_token" value="<?php echo $_SESSION['global_token'] ?>">
                        <input id="input_oculto" type="hidden" name="action" value="create">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>

        function setInputOculto(valor){
            document.getElementById("input_oculto").value = valor;
        }

        function setupModalInputs(boton){
            let info_producto = JSON.parse(boton.dataset.product);
            console.log(info_producto.id);
            document.getElementById("name").value = info_producto.name;
            document.getElementById("slug").value = info_producto.slug;
            document.getElementById("descripcion").value = info_producto.description;
            document.getElementById("caracteristicas").value = info_producto.features;
            document.getElementById("marca").value = info_producto.brand_id;
            document.getElementById("id").value = info_producto.id;
        }

        function setupModalToEdit(boton){
            setInputOculto("edit");
            setupModalInputs(boton);
        }
        function remove(id){
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
                var bodyFormData = new FormData();
                bodyFormData.append('global_token', '<?= $_SESSION['global_token'] ?>');
                bodyFormData.append('id', id);
                bodyFormData.append('action', 'delete');

                axios.post('<?= BASE_PATH?>prod', bodyFormData)
                .then(function (response){
                    if(response.status == 200){
                        window.location.href = '<?=BASE_PATH."product/all?eliminado=true" ?>';
                    }
                })
                .catch(function (error){
                    console.log('error');
                })
            }
            })
        }
    </script>

    <?php include "../layout/scripts.php"; ?>
</body>
</html>