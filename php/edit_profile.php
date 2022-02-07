<?php

session_start();

$id = $_SESSION['id'];
$name = $_POST["name"];
$email = $_POST["email"];
$telephone = $_POST["tel"];
$password = $_SESSION["password"];



$userAcc = [
    'id'=> $id,
    'name'=> $name,
    'email'=> $email,
    'tel'=> $telephone,
    'password' => $password
]; 

$ourData = file_get_contents("../database/customer.json");
$objects = json_decode($ourData);

$error_array = [];
$user_success = [];

// Делаем общую проверку на правильность заполненности полей
if(preg_match("#^[aA-zZ0-9\-_]+$#",$name)){
    $_SESSION['message'] = 'Брат ты чё сын Илона Маска, или ты из Звёздных воин? Чё за цифры в имени?';
    header('Location: ../view_edit_profile.php');
    exit();
}
// if(ctype_digit($name)){
//     die('Брат ты чё сын Илона Маска, или ты из Звёздных воин? Чё за цифры в имени?');
// }
if (strlen($telephone) !== 10){  
    $_SESSION['message'] = 'Это чё за номер, не похоже на номер телефона';
    header('Location: ../view_edit_profile.php');
    exit();
}
if (strlen($password) < 8){  
    $_SESSION['message'] = 'Не, ну так не пойдёт. Минимум 8 символов. Мы за безопасность';
    header('Location: ../view_edit_profile.php');
    exit();
}
// if (!$password === $password_confirm) {
//     die('Не похоже что пароли совпадают. Может опечатался. Попробуй снова');
// }


// // Здесь проверяем на существование такой почты и номера в базе
// if ($objects){
//     foreach ($objects as $object) {
//         // var_dump($object->email); exit();
//         if ($email === $object->email){
           
//             $error_array['email'] = 'Имеется такая почта. Негоже обмаанывать';    
//         }
//         if ($telephone === $object->tel){  
//             $error_array['telephone'] = 'Такой номерок то нацарапан уже, черкани свои цифры';   
//         }
//     }
//     // Проверям и выводим ошибки, останавливаем работу кода
//     if(count($error_array) > 0){
//         foreach ($error_array as $key => $value) {
//             echo($value . "<br>");
//         }
//         exit();
//     }         
// }


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
