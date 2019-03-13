<?php



function getDB(){
    $host = '127.0.0.1'; //localhost
    $db   = 'to_do_list';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $connectionDetails = "mysql:host=$host;dbname=$db;charset=$charset";

    $pdo = new PDO($connectionDetails, $user, $pass);
    return $pdo;
}

function redirectToIndexWithMessage($message){
        $_SESSION['message'] = $message;
        header("Location: ./index.php");
        die();
}