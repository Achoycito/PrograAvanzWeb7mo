<?php

include_once "config.php";
$brandController = new BrandController;
$arrayBrands = [];

if(isset($_SESSION["token"])){
    if(!isset($token)){
        $token = strip_tags($_SESSION["token"]);
    }
    $arrayBrands = $brandController->getAllBrands($token);
}
else{
    header("Location:".BASE_PATH."login");
    // echo "Nel compadre usted sale que no esta logeado";
    echo "<h1>NO HAY SESION[TOKEN]</h1>";
}

Class BrandController{

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
}

?>