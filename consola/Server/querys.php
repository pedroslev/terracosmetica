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
$sql = "INSERT INTO ".$DBN."_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Costo, Margen, Mostrar)
VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '$Link', '.$Costo.', '.$Margen.', '.$Precio.', '.$Mostrar.')";
$result = $conn->query($sql);

if ($result) {
$conn->close();
header("Location: ../index.php");
exit();
}
else 
{
header("Location: ../login.php");
$conn->close();}
}

//CARGAR PRODUCTO Y SEGUIR CARGANDO CON LIMPIEZA DE FORMULARIO
if (isset($_POST['SubirAWebSC'])) {

    $Codigo= $_POST['Codigo'];
    $Nombre=$_POST['Nombre'];
    $Descripcion=$_POST['Descripcion'];
    $Cantidad=$_POST['Cantidad'];
    $Categoria='1';//$_POST['Categoria'];
    $Proveedor='1';//$_POST['Proveedor'];
    $Link=$_POST['Link'];
    $Costo=$_POST['Costo'];
    $MargenSov=$_POST['MargenSov'];
    $MargenML=$_POST['MargenML'];
    $PrecioSov=$_POST['PrecioSov'];
    $PrecioML=$_POST['PrecioML'];
    $Mostrar='1';
    
    $sql = "INSERT INTO ".$DBN."_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Proveedor, Foto, Costo, MargenSov, MargenML, PrecioSov, PrecioML, Mostrar)
    VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '$Proveedor', '$Link', '.$Costo.', '.$MargenSov.', '.$MargenML.', '.$PrecioSov.', '.$PrecioML.', '.$Mostrar.')";
    $result = $conn->query($sql);
    
    if ($result) {
    header("Location: ../index.php");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../login.php");
    $conn->close();}
    }

   //ELIMINAR PRODUCTO
    if (isset($_POST['EliminarProducto'])) {

        $IDProducto= $_POST['IDProducto'];
        
        $sql = "DELETE FROM ".$DBN."_Productos WHERE ID='".$IDProducto."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../login.php");
        $conn->close();}
        }


    

    //CARGAR CATEGORIA
    if (isset($_POST['SubirCategoria'])) {

        $NombreCategoria= $_POST['NombreCategoria'];
        $IconoCategoria= $_POST['IconoCategoria'];
        
        $sql = "INSERT INTO ".$DBN."_Categorias (Nombre,Icono)
        VALUES ('$NombreCategoria','$IconoCategoria')";
        $result = $conn->query($sql);
        echo $sql;
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
            echo $sql;
        }


    //ELIMINAR CATEGORIA
    if (isset($_POST['EliminarCategoria'])) {

        $IDCategoria= $_POST['IDCategoria'];
        
        $sql = "DELETE FROM ".$DBN."_Categorias WHERE ID='".$IDCategoria."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../login.php");
        $conn->close();}
        }

    //CARGAR USUARIO
    if (isset($_POST['SubirUsuario'])) {

        $NombreUsuario = $_POST['NombreUsuario'];
        $EmailUsuario = $_POST['EmailUsuario'];
        $ContrasenaUsuario = md5($_POST['ContrasenaUsuario']);
        $NivelUsuario = $_POST['NivelUsuario'];
        
        $sql = "INSERT INTO ".$DBN."_Usuarios (Nombre, Email, Contrasena, Level)
        VALUES ('$NombreUsuario', '$EmailUsuario', '$ContrasenaUsuario' , '$NivelUsuario')";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../login.php");
        $conn->close();}
        }

    //EDITAR USUARIO
    if (isset($_POST['EditarUsuario'])) {

        $IDUsuario = $_POST['IDUsuario'];
        $NombreUsuario = $_POST['NombreUsuario'];
        $EmailUsuario = $_POST['EmailUsuario'];
        $ContrasenaUsuario = md5($_POST['ContrasenaUsuario']);
        $NivelUsuario = $_POST['NivelUsuario'];
        
        $sql = "UPDATE ".$DBN."_Usuarios SET  Nombre='".$NombreUsuario."' , Email='".$EmailUsuario."' , Contrasena='".$ContrasenaUsuario."' , Level='".$NivelUsuario."' WHERE ID='".$IDUsuario."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../login.php");
        $conn->close();}
        }

            //ELIMINAR USUARIO
    if (isset($_POST['EliminarUsuario'])) {

        $IDUsuario= $_POST['IDUsuario'];
        
        $sql = "DELETE FROM ".$DBN."_Usuarios WHERE ID='".$IDUsuario."' ";
        $result = $conn->query($sql);
        
        if ($result) {
        header("Location: ../index.php");
        $conn->close();
        exit();
        }
        else 
        {
        header("Location: ../login.php");
        $conn->close();}
        }


?>