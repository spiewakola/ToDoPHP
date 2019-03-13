<?php 
session_start();

require_once 'funkcje.php';

if(isset($_POST['id'])){
    $db = getDB();
    $sql = "DELETE FROM list WHERE id = ?";
    $query= $db->prepare($sql);
    $result = $query->execute([$_POST['id']]);
    if($result){
        redirectToIndexWithMessage("Gratulacje! Usnięto wpis z listy");
    }else{
        redirectToIndexWithMessage("Niestety! Nie udało się usunąć wpisu z listy");
    }
}