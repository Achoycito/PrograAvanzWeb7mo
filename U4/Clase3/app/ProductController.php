<?php

session_start();
$arrayProducts = [];
$arrayBrands = [];

if(isset($_SESSION["token"])){
    $productController = new ProductController();
    $token = strip_tags($_SESSION["token"]);
    $arrayProducts = $productController->getAllProducts($token);
    $arrayBrands = $productController->getAllBrands($token);
}
else{
    header("Location:..");
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
            
            $productController = new ProductController();
            $productController->createProduct($name, $slug, $descripcion, $caracteristicas, $marca, $imgproducto);
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
                "Authorization: Bearer {$token}"
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);
        if(isset($response->code) && $response->code > 0){
            return $response->data;
        }
        else{
            return [];
        }
    }

    public function getAllBrands($token){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/brands',
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

    public function createProduct($name, $slug, $descripcion, $caracteristicas, $marca, $imgproducto){

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
            "Authorization: Bearer {$_SESSION['token']}"
        ),
        CURLOPT_POSTFIELDS => array(
            'name' => $name,
            'slug' => $slug,
            'description' => $descripcion,
            'features' => $caracteristicas,
            'brand_id' => $marca,
            'cover'=> new CURLFILE($imgproducto))
        ));

        // echo $name;
        // echo $slug;
        // echo $descripcion;
        // echo $caracteristicas;
        // echo $marca;
        // echo $imgproducto;

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            header("Location:../products/?success=ok");
        }
        else{
            header("Location:../products/?error=true");
        }


    }

    public function getProductDetail(){
        
    }
}
?>