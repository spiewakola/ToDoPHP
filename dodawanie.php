<?php
session_start();

require_once 'funkcje.php';


if(isset($_POST['name']) && isset($_POST['description'])){
    $db = getDB();
    $sql = "INSERT INTO list (name, description,date) VALUES (?,?,?)";
    $query= $db->prepare($sql);
    $result = $query->execute([$_POST['name'], $_POST['description'],(new DateTime())->format('Y-m-d H:i:s')]);
    if($result){
        redirectToIndexWithMessage("Gratulacje! Dodano do listy");
    }else{
        redirectToIndexWithMessage("Niestety! Nie udało się zapisać do bazy danych");
    }
}else{
        redirectToIndexWithMessage("Uzupełnij wszystkie pola");
}
