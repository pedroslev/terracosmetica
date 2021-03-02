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
$MargenSov=$_POST['MargenSov'];
$MargenML=$_POST['MargenML'];
$PrecioSov=$_POST['PrecioSov'];
$PrecioML=$_POST['PrecioML'];
$Mostrar='1';

$sql = "INSERT INTO SOV_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Proveedor, Foto, Costo, MargenSov, MargenML, PrecioSov, PrecioML, Mostrar)
VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '$Proveedor', '$Link', '.$Costo.', '.$MargenSov.', '.$MargenML.', '.$PrecioSov.', '.$PrecioML.', '.$Mostrar.')";
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
    
    $sql = "INSERT INTO SOV_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Proveedor, Foto, Costo, MargenSov, MargenML, PrecioSov, PrecioML, Mostrar)
    VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '$Proveedor', '$Link', '.$Costo.', '.$MargenSov.', '.$MargenML.', '.$PrecioSov.', '.$PrecioML.', '.$Mostrar.')";
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
        
        $sql = "DELETE FROM SOV_Productos WHERE ID='".$IDProducto."' ";
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


    //CARGAR PROVEEDOR
    if (isset($_POST['SubirProveedor'])) {

        $NombreProveedor= $_POST['ProveedorConf'];
        $TelefonoProveedor=$_POST['ProveedorTelConf'];
        $DireccionProveedor= $_POST['ProveedorDirConf'];
        $EmailProveedor= $_POST['ProveedorEmailConf'];
        
        $sql = "INSERT INTO SOV_Proveedores (Nombre, Telefono, Direccion, Email)
        VALUES ('$NombreProveedor', '$TelefonoProveedor', '$DireccionProveedor' , '$EmailProveedor')";
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

    //EDITAR PROVEEDOR
    if (isset($_POST['EditarProveedor'])) {
        
        $IDProveedor= $_POST['IDProveedor'];
        $NombreProveedor= $_POST['ProveedorEdit'];
        $TelefonoProveedor=$_POST['ProveedorTelEdit'];
        $DireccionProveedor= $_POST['ProveedorDirEdit'];
        $EmailProveedor= $_POST['ProveedorEmailEdit'];
        
        $sql = "UPDATE SOV_Proveedores SET  Nombre='".$NombreProveedor."' , Telefono='".$TelefonoProveedor."' , Direccion='".$DireccionProveedor."' , Email='".$EmailProveedor."' WHERE ID='".$IDProveedor."' ";
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

//ELIMINAR PROVEEDOR
    if (isset($_POST['EliminarProveedor'])) {

        $IDProveedor= $_POST['IDProveedor'];
        
        $sql = "DELETE FROM SOV_Proveedores WHERE ID='".$IDProveedor."' ";
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
        
        $sql = "INSERT INTO SOV_Categorias (Nombre,Icono)
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
        
        $sql = "DELETE FROM SOV_Categorias WHERE ID='".$IDCategoria."' ";
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
        
        $sql = "UPDATE SOV_Usuarios SET  Nombre='".$NombreUsuario."' , Email='".$EmailUsuario."' , Contrasena='".$ContrasenaUsuario."' , Level='".$NivelUsuario."' WHERE ID='".$IDUsuario."' ";
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
        
        $sql = "DELETE FROM SOV_Usuarios WHERE ID='".$IDUsuario."' ";
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