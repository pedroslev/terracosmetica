<?php
session_start();
if(empty($_SESSION['IDUsuario'])){
    header("Location: ./login.php");
    exit();
}
?>