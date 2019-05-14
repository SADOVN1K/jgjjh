<?php

require_once 'connect.php';
header("Content-type: application/json; charset=utf-8");

session_start();

if (isset($_POST['login']) and isset($_POST['password'])) { 
    $login = $_POST['login'];
    $password = md5($_POST['password']); 

    $query = "SELECT id,login FROM account WHERE login = '$login' AND password = '$password'";
    
    $request = $dbconnect->query($query);
    $results = $request->fetchAll(PDO::FETCH_ASSOC);
    
    @$loginInDB = ($results[0]['login']);
    @$id = ($results[0]['id']);
    
    $_SESSION["userID"] = $id;
    
    if ($login == $loginInDB) {
        $_SESSION["userLogin"] = $loginInDB;
    } else {
        $error = ['status' => 'error'];
        echo json_encode($error);
    }
    
    if (isset($_SESSION["userID"])) {
       header("Location: ../panel.php");
    };
} else {
    $error = ['status' => 'error'];
    echo json_encode($error);
};