<!doctype html>
<html lang="en">
 <head>
	<meta charset="utf-8">
	<title>Haze SOV</title>
	<meta name="author" content="HAZEinc.">
	<meta name="description" content="Ventas online y control de stock">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/signin.css" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="media/favicon.png"/>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<?php
if (isset($_POST['Login'])) {

    include './Server/database.php';
 
    $EmailLogin = $_POST['EmailLogin'];
    $ContrasenaLogin = md5($_POST['ContrasenaLogin']);
        
    $sql = "SELECT * FROM SOV_Usuarios WHERE Email = '".$EmailLogin."' AND Contrasena = '".$ContrasenaLogin."'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
    $conn->close();
    session_start();
    $fila = mysqli_fetch_object($result);
    $_SESSION['IDUsuario']= $fila->ID;
    $_SESSION['NombreUsuario']= $fila->Nombre;
    $_SESSION['NivelUsuario']= $fila->Level;
    $_SESSION['Autorizado']="SI";
    header("Location: index.php");
    exit();
    }
    else 
    {   
        $badlogin=true;
        $conn->close();
        header("Location: login.php");
        exit();
    }
}

?>


  <body class="text-center">
    <form method="POST" class="form-signin">
      <img class="mb-4" src="media/HazeMolino.png" alt="HazeMolino" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Haze Login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="Email" id="EmailLogin" name="EmailLogin" class="form-control" placeholder="Email" required autofocus>
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="ContrasenaLogin" name="ContrasenaLogin" class="form-control" placeholder="Contraseña" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="Login">Ingresar</button>
      <a href="http://hazear.com/" target="_blank"><p class="mt-5 mb-3 text-muted">&copy; S.O.V. 2020</p></a>
    </form>
  </body>
</html>
