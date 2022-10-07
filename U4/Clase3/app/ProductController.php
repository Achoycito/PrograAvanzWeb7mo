<?php

include_once "config.php";

$productController = new ProductController();

$arrayProducts = [];
$url_product_slug = "";
$product_details = [];

if(isset($_SESSION["token"])){
    if(!isset($token)){
        $token = strip_tags($_SESSION["token"]);
    }
    $arrayProducts = $productController->getAllProducts($token);
    if(isset($_GET["slug"])){
        $url_product_slug = $_GET["slug"];
        $product_details = $productController->getProductDetail($token, $url_product_slug);
    }
    else{
        echo "<h1>No hay slug en el URL</h1>";
    }
}
else{
    header("Location:".BASE_PATH);
    // echo "Nel compadre usted sale que no esta logeado";
    echo "<h1>NO HAY SESION[TOKEN]</h1>";
}

if(isset($_POST["action"])){
    switch($_POST["action"]){
        case "create":
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $descripcion = strip_tags($_POST['descripcion']);
            $caracteristicas = strip_tags($_POST['caracteristicas']);
            $marca = strip_tags($_POST['marca']);
            
            $imgproducto = $_FILES['imgproducto']['tmp_name'];
            
            $productController->createProduct($token, $name, $slug, $descripcion, $caracteristicas, $marca, $imgproducto);
            break;
        case "edit":
            $name = strip_tags($_POST['name']);
            $slug = strip_tags($_POST['slug']);
            $descripcion = strip_tags($_POST['descripcion']);
            $caracteristicas = strip_tags($_POST['caracteristicas']);
            $marca = strip_tags($_POST['marca']);
            $id = strip_tags($_POST['id']);
            $productController->updateProduct($token, $name, $slug, $descripcion, $caracteristicas, $marca, $id);
            break;
        case 'delete':
            $id = strip_tags($_POST["id"]);
            $productController->deleteProduct($token, $id);
            break;
        }
}

Class ProductController{
    public function getAllProducts($token){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".$token
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            return $response->data;
        }
        else{
            return [];
        }
    }

    public function createProduct($token, $name, $slug, $descripcion, $caracteristicas, $marca, $imgproducto){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer ".$token
        ),
        CURLOPT_POSTFIELDS => array(
            'name' => $name,
            'slug' => $slug,
            'description' => $descripcion,
            'features' => $caracteristicas,
            'brand_id' => $marca,
            'cover'=> new CURLFILE($imgproducto))
        ));

        // echo $name;echo $slug;echo $descripcion;echo $caracteristicas;echo $marca;echo $imgproducto;

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            header("Location:".BASE_PATH."products/?agregado=true");
        }
        else{
            header("Location:".BASE_PATH."products/?agregado=false");
        }
    }

    public function updateProduct($token, $name, $slug, $descripcion, $caracteristicas, $marca, $id){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'PUT',
        CURLOPT_POSTFIELDS => 
        'name='.$name.'
        &slug='.$slug.'
        &description='.$descripcion.'
        &features='.$caracteristicas.'
        &brand_id='.$marca.'
        &id='.$id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token,
            'Content-Type: application/x-www-form-urlencoded'
        ),
        ));

        // echo $name;echo $slug;echo $descripcion;echo $caracteristicas;echo $marca;echo $id;

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            header("Location:".BASE_PATH."products/?editado=true");
        }
        else{
            header("Location:".BASE_PATH."products/?editado=false");
        }
    }

    public function deleteProduct($token, $id){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
    }

    public function getProductDetail($token, $url_product_slug){
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/products/slug/'.$url_product_slug,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;
        $response = json_decode($response);
        
        if(isset($response->code) && $response->code > 0){
            return $response->data;
        }
        else{
            return [];
        }
    }
}
?>