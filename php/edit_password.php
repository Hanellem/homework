<?php
session_start();


$id = $_SESSION['id'];
$name = $_SESSION["name"];
$email = $_SESSION["email"];
$telephone = $_SESSION["tel"];
$password = $_SESSION["password"];

$old_password = $_POST['password'];
$new_password = $_POST['new_password'];
$password_confirm = $_POST["password_confirm"];


$userAcc = [
    'id'=> $id,
    'name'=> $name,
    'email'=> $email,
    'tel'=> $telephone,
    'password' => $new_password
]; 

$ourData = file_get_contents("../database/customer.json");
$objects = json_decode($ourData);



if($old_password === $password){
    if($new_password === $password_confirm){
        if (strlen($new_password) < 8){  
            die('Слишком маленькая длина пароля. Минимум 8 символов');
        }
    }else{
        die('Похоже не совпадает новый пароль с проверкой. Хмм.. Попробуй снова');
    }
}else{
    die('Похоже неправильно пароль свой указываешь старый. Хмм.. Попробуй снова');
}

foreach ($objects as $key=>$value) {

    if ($id === $value->id) {

		$objects[$key] = $userAcc;
		$handle = fopen('../database/customer.json', 'w+');

		$encode_objects = json_encode($objects);
		fwrite($handle, $encode_objects);
		fclose($handle);

		die('Vse good mzf');
   
    }
}