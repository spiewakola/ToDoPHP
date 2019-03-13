<?php 
session_start();
require_once 'pobieranie.php';

function getOneFromList($id){
    $db = getDB();
    $query = $db->prepare("SELECT * FROM list WHERE id=?");
    $query->execute([$id]); 
    return $query->fetch(PDO::FETCH_ASSOC);
}


if(isset($_POST['name']) && isset($_POST['description'])){

    $db = getDB();
    $sql = "UPDATE list SET `name`=?, `description`=? WHERE `id`=?";
    $query= $db->prepare($sql);
    $result = $query->execute([$_POST['name'],$_POST['description'],$_GET['id']]);
    if($result){
        redirectToIndexWithMessage("Edycja powiodła się");
    }else{
        redirectToIndexWithMessage("Edycja nie powiodła się");
    }
}

$element =  getOneFromList($_GET['id']);

?>

<html>
    <head>
    </head>
    <body>
        <form method="POST">
            <input value="<?php echo $element['name'] ?>" name="name" type="text" placeholder="Nazwa"/>
            <input  value="<?php echo $element['description'] ?>" name="description" type="text" placeholder="Opis"/>
            <button type="submit">Zapisz</button>
        </form>
    </body>
</html>