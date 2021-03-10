<?php

$DBN="TERRA";

$conn=new mysqli("localhost", "u839063682_terrauser", "Terrapassword1", "u839063682_TERRA");


if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

?>
