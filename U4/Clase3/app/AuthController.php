<?php
include_once "config.php";

if(isset($_POST['action'])){
    echo "esta seteado el action";
    if(isset($_POST["global_token"]) && ($_POST["global_token"] == $_SESSION["global_token"])){
        echo "segunda validacion que hueva escribir toda";
    
        switch($_POST['action']){
            case 'access':
                echo "switch case access";
                $authController = new AuthController();
                $email = strip_tags($_POST['email']);
                $password = strip_tags($_POST['password']);
                $authController->login($email, $password);
            break;
        }
    }
}

Class AuthController{
    public function login($email, $password){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;

        $response = json_decode($response);

        if(isset($response->code) && $response->code > 0){
            // session_start();
            $_SESSION["name"] = $response->data->name;
            $_SESSION["lastname"] = $response->data->lastname;
            $_SESSION["avatar"] = $response->data->avatar;
            $_SESSION["global_token"] = $response->data->token;
            header("Location:../products");
        }
        else{
            header("Location:../?error=true");
            echo "error";
        }
    }
}

?>