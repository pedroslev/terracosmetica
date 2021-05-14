<?php

//Directorio Fotos Ecommerce
$PWD="./productos/";
//Directorio Fotos Consola
$PWDConsola="../terracosmetica_html/productos/";
//Directorio Carga Productos
$target_dir = "/home/u839063682/public_html/terracosmetica_html/productos/";
//Versión
$VERSION="T 0.0.0";
//Nombre previo a DB
$DBN="TERRA";

#$conn=new mysqli("localhost", "u839063682_terrauser", "Terrapassword1", "u839063682_TERRA");
$conn=new mysqli("sql436.main-hosting.eu", "u839063682_terrauser", "Terrapassword1", "u839063682_TERRA");


if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

?>
