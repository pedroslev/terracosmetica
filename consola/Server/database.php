<?php

$DBN="TERRA";

$PWD="./consola/img/";
$PWDConsola="./img/";

$VERSION="T 0.0.0";

#$conn=new mysqli("localhost", "u839063682_terrauser", "Terrapassword1", "u839063682_TERRA");
$conn=new mysqli("sql436.main-hosting.eu", "u839063682_terrauser", "Terrapassword1", "u839063682_TERRA");


if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

?>
