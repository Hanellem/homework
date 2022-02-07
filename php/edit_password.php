<?php
session_start();


$id = $_SESSION['id'];
$name = $_SESSION["name"];
$email = $_SESSION['email'];
$telephone = $_SESSION['tel'];
$password = $_SESSION['password'];

$old_password = $_POST['password'];
$new_password = $_POST['new_password'];
$password_confirm = $_POST["password_confirm"];

// Передадим уже существующие данные юзера и новый пароль
$userAcc = [
    'id'=> $id,
    'name'=> $name,
    'email'=> $email,
    'tel'=> $telephone,
    'password' => $new_password
]; 

$ourData = file_get_contents("../database/customer.json");
$objects = json_decode($ourData);

// Выполням проверки на соответсвие
if($old_password === $password){
    if($new_password === $password_confirm){
        if (strlen($new_password) < 8){  
            $_SESSION['message'] = 'Слишком маленькая длина пароля. Минимум 8 символов';
            header('Location: ../view_edit_password.php');
            exit();
        }
    }else{
        $_SESSION['message'] = 'Похоже не совпадает новый пароль с проверкой. Хмм.. Попробуй снова';
        header('Location: ../view_edit_password.php');
        exit();
    }
}else{
    $_SESSION['message'] = 'Похоже неправильно пароль свой указываешь старый. Хмм.. Попробуй снова';
    header('Location: ../view_edit_password.php');
    exit();
}
// Перебираем масив и если по айди перезаписываем массив и в целом переписываем весь файл с новыми данными
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