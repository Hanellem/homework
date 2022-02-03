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

$ourData = file_get_contents("customer.json");
$objects = json_decode($ourData);

$error_array = [];
$user_success = [];


foreach ($objects as $key=>$value) {

    if ($id === $value->id) {

		$objects[$key] = $userAcc;
		var_dump($objects);
		// exit();
		$handle = fopen('customer.json', 'w+');

		$encode_objects = json_encode($objects);
		fwrite($handle, '[' . $encode_objects . ']');
		fclose($handle);

		die('Vse good mzf');
   
    }
}
