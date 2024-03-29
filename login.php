<?php
  require_once('src/Entities/conexion.php');
  require_once('src/Entities/User.php');
  require_once('src/Entities/AccessUser.php');
  require_once('src/Validators/loginValidator.php');

session_start();

var_dump($_POST);


$errorArray=[];

 if(!empty($_POST)){


  if (!isset($_POST['email'])) {
     $errorArray['email'][] ='El campo Email es requerido';
  }

  if (empty($_POST['email'])) {
    $errorArray['email'][] ='El campo Email está vacío';
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errorArray['email'][] ='el valor ingresado no es un email válido';
  }

  if (!isset($_POST['passwd'])) {
     $errorArray['passwd'][] ='El passwd es requerido';
  }

  if (strlen($_POST['passwd']) < 6 || strlen($_POST['passwd']) > 12 ) {
    $errorArray['passwd'][] ='El passwd debe tener entre 6 y 12 caracteres';
  }

  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errorArray['email'][] ='el valor ingresado no es un email válido';
  }
}

$user = new AccUser;
$user->setEmail($_POST['email']);
$user->setpasswd($_POST['passwd']);

$user->obtenerUsuario($user->getEmail(), $user->getPassword()); ;





// Traer los valores de email y passwd desde DB
// validar los valores de POST con la consulta de DB y hacer login












?>

<!DOCTYPE html>
<html lang="sp" dir="ltr">
<head>
  <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">
      <title>pLogin</title>

</head>
  <body>
    <?php
      include ("header.php");
    ?>
    <div class="containerLogin">
    <form method="POST" novalidate>
      <div class="avatar"></div>
      <div "form-control form-control-lg">
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            <p class="font-weight-light"><?= $errorArray['email'][0] ?? '' ?></p>
        </div>
        <div class="form-group">
          <label for="exampleInputpasswd1">Contraseña</label>
          <input type="password" class="form-control" id="exampleInputpasswd1" placeholder="passwd" name="passwd">
            <p class="font-weight-light"><?= $errorArray['passwd'][0] ?? '' ?></p>
        </div>
        <div class="form-group form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
          <label class="form-check-label" for="exampleCheck1">Recuerdame</label>
        </div>
        <button type="submit" class="btn btn-info btn-block login">Enviar</button>
      </div>
    </form>
</div>
    <?php
      include ("footer.php");
    ?>
  </body>
</html>
