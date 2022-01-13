<?php
 
require_once 'customer.json';



$name = $_POST["name"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$password = $_POST["password"]; 
$password_confirn = $_POST["password_confirn"];


$id = uniqid();


$userAcc = [
    'id'=> $id,
    'name'=> $name,
    'email'=> $email,
    'tel'=> $telephone,
    'password'=> $password
]; 
// var_dump($userAcc); 
// exit();
$encodeUserAcc = json_encode($userAcc);

if ($password === $password_confirn) {

    //Читаем файл json  
    $handle = fopen('customer.json', 'r+');
    // Если не находим такие данные, то создаём нового юзера, (перемещаем курсор в начало)
    if ($handle === null){
    $handle = fopen('customer.json', 'w+');
    }

    if ($handle){
    //ищем до конца
    fseek($handle, 0, SEEK_END);

    // оказываемся в конце пустого файла
    if (ftell($handle) > 0) {
        // перемещаемся на байт назад
        fseek($handle, -1, SEEK_END);

        // добавляемя запятую
        fwrite($handle, ',', 1);

        // добавляем новую строку json
        fwrite($handle, $encodeUserAcc . ']');

        
    }else{
        // записать певое событие внутри массива
        fwrite($handle, '[' . $encodeUserAcc . ']');
    }

// закрыть дескриптор файла
        fclose($handle);
}



die('Аккаунт создан');

// if ($password === $password_confirn) {

//     $contents = file_get_contents('customer.json');
//     $contentsDecoded = json_decode($contents, true);
//     $contentsDecoded['loginHistory'][] = $userAcc;
//     $json = json_encode($contentsDecoded);
//     file_put_contents('customer.json', $json);

// die('Аккаунт создан');





    // $accountData = file_put_contents('customer.json', $encodeUserAcc);
    // exit();
} else {
    die('Пароли не совпадают');
    
    
    
}

