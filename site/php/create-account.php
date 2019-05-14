<?php

require_once 'connect.php';
header("Content-type: application/json; charset=utf-8");

if (isset($_POST['login']) and isset($_POST['password']) and isset($_POST['surname']) and isset($_POST['name']) and isset($_POST['patronymic'])) {
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $patronymic = $_POST['patronymic'];
    
    $query = "SELECT login FROM account WHERE login = '$login'";
    $requestCheck = $dbconnect->query($query);
    $results = $requestCheck->fetchAll(PDO::FETCH_ASSOC);
    @$loginInDB = ($results[0]['login']);

    if ($login == $loginInDB) {
        
        return;
    } else {
    
      echo 'Поздравляю!';
    }

} else {
    echo 'Вы неправильно указали данные!';
}




