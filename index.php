<?php
session_start();
require_once 'pobieranie.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>To Do</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css" />


</head>

<body>
  <div class="container-fluid">
    <?php if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }
        ?>
    <form method="POST" action="./dodawanie.php">
      <h4>LISTA ZADAŃ</h4>
      <div class="input-group mb-3">
        <div class="form-group">
          <input name="name" type="text" class="form-control" placeholder="Tytuł">
        </div>
        <div class="form-group">
          <input name="description" type="text" class="form-control" placeholder="Opis">
        </div>
        <div class="form-group">
          <button class="btn btn-secondary" type="submit">Dodaj</button>
        </div>
      </div>
    </form>
    <div class="col-12">
      <table class="table">
        <tbody>

          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">TYTUŁ</th>
              <th scope="col">OPIS</th>
              <th scope="col">DATA</th>
              <th scope="col"></th>
            </tr>
          </thead>
        <tbody>
          <?php foreach (getAllToDo() as $toDo):?>
          <tr>
            <th scope="row"><?php echo $toDo['id'] ?></th>
            <td><?php echo $toDo['name'] ?></td>
            <td><?php echo $toDo['description'] ?></td>
            <td><?php echo $toDo['date'] ?></td>
            <td>
              <form method="POST" action="./usuwanie.php">
                <td style="padding-left:20px;"><button type="submit">X</button></td>
                <input type="hidden" name="id" value="<?php echo $toDo['id'] ?>" />
              </form>
              <form method="GET" action="./edycja.php">
                <td style="padding-left:10px;"><button type="submit">EDYTUJ</button></td>
                <input type="hidden" name="id" value="<?php echo $toDo['id'] ?>" />
              </form>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>