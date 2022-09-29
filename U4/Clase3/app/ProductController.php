<?php

session_start();
$arrayProducts = [];

if(isset($_SESSION["token"])){
    $productController = new ProductController();
    $token = strip_tags($_SESSION["token"]);
    $arrayProducts = $productController->getAllProducts($token);
}
else{
    header("Location:..");
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
    }
}
?>