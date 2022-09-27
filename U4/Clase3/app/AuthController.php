<?php

// if(isset($_POST['action'])){
//     switch($_POST['action']){
//         case 'access':
//             $authController = new AuthController();
//             $email = strip_tags($_POST['email']);
//             $password = strip_tags($_POST['password']);
//     }
// }

$authC = new AuthController();
$authC->login('','');

Class AuthController{
    public function login($email, $password){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('email' => 'agonzalez2_19@alu.uabcs.mx','password' => '2b2Aw@6UIf34ZY'),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        echo $response;
        
        // var_dump($response);
        // echo 'Hola';
    }
}

?>