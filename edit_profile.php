<?php

session_start();

$id = $_SESSION['id'];
$name = $_POST["name"];
$email = $_POST["email"];
$telephone = $_POST["tel"];
$password = $_POST["password"];

$userAcc = [
    'id'=> $id,
    'name'=> $name,
    'email'=> $email,
    'tel'=> $telephone,
    'password' => $password
]; 

$encodeUserAcc = json_encode($userAcc);
$ourData = file_get_contents("customer.json");
$objects = json_decode($ourData);

$error_array = [];
$user_success = [];


foreach ($objects as $object) {

    if ($id === $object->id) {
        $profile = $object;

        // $index = indexOf($object);
        // splice($index);
        unset($object[$key]);
        $handle = fopen('customer.json', 'r+');
        // unset($objects[$object]);

        

        fseek($handle, 0, SEEK_END);

    
            // перемещаемся на байт назад и убираем последний символ, он же "]"
            fseek($handle, -1, SEEK_END);

            // добавляемя запятую
            fwrite($handle, ',', 1);

            // добавляем новую строку json, добавляем в конец "]"
            fwrite($handle, $encodeUserAcc . ']');

            fclose($handle);
        
    }
}
    

        












 