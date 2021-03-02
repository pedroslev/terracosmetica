<?php

$conn=new mysqli("localhost", "u839063682_Sovuser1", "Sovpassword1", "u839063682_sov");


if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}

?>
