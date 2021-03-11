<?php

include './database.php';

//CARGAR PRODUCTO Y REDIRECCIONAR A INICIO
if (isset($_POST['SubirAWeb'])) {

$Codigo= $_POST['Codigo'];
$Nombre=$_POST['Nombre'];
$Descripcion=$_POST['Descripcion'];
$Cantidad=$_POST['Cantidad'];
$Categoria=$_POST['Categoria'];
$Proveedor=$_POST['Proveedor'];
$Link=$_POST['Link'];
$Costo=$_POST['Costo'];
$Margen=$_POST['MargenML'];
$Precio=$_POST['PrecioML'];
$Mostrar='1';

//AGREGAR IMAGENES
$sql = "INSERT INTO TERRA_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Costo, Margen, Mostrar)
VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '$Link', '.$Costo.', '.$Margen.', '.$Precio.', '.$Mostrar.')";
$result = $conn->query($sql);

if ($result) {
$conn->close();
header("Location: ../index.php");
exit();
}
else 
{
header("Location: ../signin.html");
$conn->close();}
}

//CARGAR PRODUCTO Y SEGUIR CARGANDO CON LIMPIEZA DE FORMULARIO
if (isset($_POST['SubirAWeb'])) {

    $Codigo= $_POST['Codigo'];
    $Nombre=$_POST['Nombre'];
    $Descripcion=$_POST['Descripcion'];
    $Stock=$_POST['Stock'];
    $_POST['Categoria'];
    $Costo=$_POST['Costo'];
    $Margen=$_POST['Margen'];
    $Precio=$_POST['Precio'];
    $Mostrar='1';
    
    $sql = "INSERT INTO TERRA_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Costo, Margen, Precio, Mostrar)
    VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '.$Costo.', '.$Margen.', '.$Precio.', '.$Mostrar.')";
    $result = $conn->query($sql);
    
    if ($result) {
    header("Location: ../index.php");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../signin.html");
    $conn->close();}
    }

   //ELIMINAR PRODUCTO
    if (isset($_POST['EliminarProducto'])) {

        $IDProducto= $_POST['IDProducto'];
        
        $sql = "DELETE FROM TERRA_Productos WHERE ID='".$IDProducto."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../signin.html");
        $conn->close();}
        }


    

    //CARGAR CATEGORIA
    if (isset($_POST['SubirCategoria'])) {

        $NombreCategoria= $_POST['NombreCategoria'];
        $IconoCategoria= $_POST['IconoCategoria'];
        
        $sql = "INSERT INTO TERRA_Categorias (Nombre,Icono)
        VALUES ('$NombreCategoria','$IconoCategoria')";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../signin.html");
        $conn->close();}
        }


    //ELIMINAR CATEGORIA
    if (isset($_POST['EliminarCategoria'])) {

        $IDCategoria= $_POST['IDCategoria'];
        
        $sql = "DELETE FROM TERRA_Categorias WHERE ID='".$IDCategoria."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../signin.html");
        $conn->close();}
        }

    //CARGAR USUARIO
    if (isset($_POST['SubirUsuario'])) {

        $NombreUsuario = $_POST['NombreUsuario'];
        $EmailUsuario = $_POST['EmailUsuario'];
        $ContrasenaUsuario = md5($_POST['ContrasenaUsuario']);
        $NivelUsuario = $_POST['NivelUsuario'];
        
        $sql = "INSERT INTO SOV_Usuarios (Nombre, Email, Contrasena, Level)
        VALUES ('$NombreUsuario', '$EmailUsuario', '$ContrasenaUsuario' , '$NivelUsuario')";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../signin.html");
        $conn->close();}
        }

    //EDITAR USUARIO
    if (isset($_POST['EditarUsuario'])) {

        $IDUsuario = $_POST['IDUsuario'];
        $NombreUsuario = $_POST['NombreUsuario'];
        $EmailUsuario = $_POST['EmailUsuario'];
        $ContrasenaUsuario = md5($_POST['ContrasenaUsuario']);
        $NivelUsuario = $_POST['NivelUsuario'];
        
        $sql = "UPDATE TERRA_Usuarios SET  Nombre='".$NombreUsuario."' , Email='".$EmailUsuario."' , Contrasena='".$ContrasenaUsuario."' , Level='".$NivelUsuario."' WHERE ID='".$IDUsuario."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../signin.html");
        $conn->close();}
        }

            //ELIMINAR USUARIO
    if (isset($_POST['EliminarUsuario'])) {

        $IDUsuario= $_POST['IDUsuario'];
        
        $sql = "DELETE FROM TERRA_Usuarios WHERE ID='".$IDUsuario."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../signin.html");
        $conn->close();}
        }


?>