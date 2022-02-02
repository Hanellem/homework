<?php
session_start();
// Передаём всё с формы хтмл в переменные с помощью параметра пост что скрывает данные в строке 

$email = $_POST["email"];
$password = $_POST["password"]; 

$ourData = file_get_contents("customer.json");
// Преобразуем в объект
$objects = json_decode($ourData);


if ($objects){
    
    $success_array = false;
    $error_array = [];
    $user_success = []; 
    foreach ($objects as $object) {
        // Проверяем на совпадение емейла и пароля
        // Если совпал логин и пароль значит зайдёт
        // Если совпал только логин значит пароль был неправильный и ошибка
        // Если не сопал логин, то значит акка не существует       
        if ($email === $object->email && $password === $object->password){           
              $success_array = true;
              $user_success = $object;
        }else{
            if ($email === $object->email){

                $error_array['email'][] = true;

            }else{
                $error_array['email'][] = false;
            }
        }       
    }
    // Выводим ошибки завершая дальшую работу кода
    if(!$success_array){
        if(in_array(true, $error_array['email'])){
            die('Чёт не совпадают пароли. Может опечатка?');
        }else{
            die('Похоже нет такого в базе у нас');
        }
    }else{
        // Присвоим глобальной переменной значение юзера который зашел, чтобы с помощью неё передать потом на профиль
        $_SESSION['id'] = $user_success->id;
        $_SESSION['email'] = $user_success->email;
        $_SESSION['name'] = $user_success->name;
        $_SESSION['tel'] = $user_success->tel;
        $_SESSION['password'] = $user_success->password;
        // Отправляем на страницу профиля
        header('Location: profile.php');
        
    }

}else{
    die('Похоже ты будешь первым кто зарегистрируется)');
}
