<?php
 
// Передаём всё с формы хтмл в переменные с помощью параметра пост что скрывает данные в строке 
$name = $_POST["name"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$password = $_POST["password"]; 
$password_confirm = $_POST["password_confirm"];

// Создаём для каждого аккаунта свой айди, дабы потом можно потом с помощью него менять данные
$id = uniqid();

// Помещаем всё для удобства в массив
$userAcc = [
    'id'=> $id,
    'name'=> $name,
    'email'=> $email,
    'tel'=> $telephone,
    'password'=> $password
]; 


$encodeUserAcc = json_encode($userAcc);

$ourData = file_get_contents("../database/customer.json");
// Преобразуем в объект
$objects = json_decode($ourData);
$error_array = [];


// Делаем общую проверку на правильность заполненности полей
if(preg_match("#^[aA-zZ0-9\-_]+$#",$name)){
    die('Брат ты чё сын Илона Маска, или ты из Звёздных воин? Чё за цифры в имени?');
}
// if(ctype_digit($name)){
//     die('Брат ты чё сын Илона Маска, или ты из Звёздных воин? Чё за цифры в имени?');
// }
if (strlen($telephone) !== 10){  
    die('Это чё за номер, не похоже на номер телефона');
}
if (strlen($password) < 8){  
    die('Слишком маленькая длина пароля. Минимум 8 символов');
}



// Здесь проверяем на существование такой почты и номера в базе
if ($objects){
    foreach ($objects as $object) {
        // var_dump($object->email); exit();
        if ($email === $object->email){
           
            $error_array['email'] = 'Имеется такая почта. Негоже обмаанывать';    
        }
        if ($telephone === $object->tel){  
            $error_array['telephone'] = 'Такой номерок то нацарапан уже, черкани свои цифры';   
        }
    }
    // Проверям и выводим ошибки, останавливаем работу кода
    if(count($error_array) > 0){
        foreach ($error_array as $key => $value) {
            echo($value . "<br>");
        }
        exit();
    }         
}



// Проверяем на совпадение паролей
if ($password === $password_confirm) {

//Читаем файл json  
$handle = fopen('../database/customer.json', 'r+');
// Если не находим такой файл, то пытаемся создать его, (перемещаем курсор в начало)
if ($handle === null){
$handle = fopen('../database/customer.json', 'w+');
}

if ($handle){
//ищем до конца
fseek($handle, 0, SEEK_END);

    // оказываемся в конце пустого файла
    if (ftell($handle) > 0){
        // перемещаемся на байт назад и убираем последний символ, он же "]"
        fseek($handle, -1, SEEK_END);

        // добавляемя запятую
        fwrite($handle, ',', 1);

        // добавляем новую строку json, добавляем в конец "]"
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

