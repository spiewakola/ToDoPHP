<?php

require_once 'funkcje.php';

function getAllToDo(){
    $db = getDB();
    $query = $db->query("SELECT * FROM list");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
