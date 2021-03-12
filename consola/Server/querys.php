<?php

include './database.php';

//CARGAR PRODUCTO
if (isset($_POST['SubirAWeb'])) {

    $Codigo= $_POST['Codigo'];
    $Nombre=$_POST['Nombre'];
    $Descripcion=$_POST['Descripcion'];
    $Stock=$_POST['Stock'];
    $Categoria=$_POST['Categoria'];
    $Costo=$_POST['Costo'];
    $Margen=$_POST['Margen'];
    $Precio=$_POST['Precio'];
    $Oferta=$_POST['Oferta'];
    $Mostrar='1';
    
    $sql = "INSERT INTO TERRA_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Costo, Margen, Precio, Oferta, Mostrar)
    VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '.$Costo.', '.$Margen.', '$Precio', '.$Oferta.', '$Mostrar')";
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

    //EDITAR PRODUCTO
    //SIN TERMINAR
        if (isset($_POST['EditarProductoBoton'])) {
        
        $sql = "INSERT INTO TERRA_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Costo, Margen, Precio, Oferta, Mostrar)
        VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Cantidad', '$Categoria', '.$Costo.', '.$Margen.', '$Precio', '.$Oferta.', '$Mostrar')";
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
$Operacion="Categoria";
if (isset($_POST['Subir'.$Operacion.''])) {
    //Post de datos
    $Nombre= $_POST[''.$Operacion.'Nombre'];
    //Si el usuario no envia icono asiga un "?"
    if (empty($_POST[''.$Operacion.'Icono'])){
    $Icono="help-circle"; 
    } else {
    $Icono=$_POST[''.$Operacion.'Icono']; 
    };

    //Insert en Tabla - $DBN se modifica en:/server/datavase.php
    $sql = "INSERT INTO ".$DBN."_".$Operacion.'s'." (Nombre,Icono)
    VALUES ('$Nombre','$Icono')";
    $result = $conn->query($sql);
    $conn->close();

    if ($result) {
        header("Location: ../consola/index.php#'.$Operacion.'");
        
        exit();
    }
    else 
    {
        header("Location: ../consola/login.php");
        
        exit();
    }
}

//EDITAR: Categoria
$Operacion="Categoria";
if (isset($_POST['Editar'.$Operacion.''])) {
    //Post de datos
    $ID=$_POST['ID'.$Operacion.''];
    
    //Si el usuario no envia icono asiga un "?"
    if (empty($_POST[''.$Operacion.'EditIcono'])){
    $Icono="help-circle"; 
    } else {
    $Icono=$_POST[''.$Operacion.'EditIcono']; 
    }; 

     //Si el usuario cambia el nombre por un blank no lo modifica en DB
    if (!empty($_POST[''.$Operacion.'EditNombre'])){
        $Nombre=$_POST[''.$Operacion.'EditNombre'];
        //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
        $sql = "UPDATE ".$DBN."_".$Operacion.'s'." SET  Nombre='".$Nombre."' , Icono='".$Icono."'  WHERE ID='".$ID."' ";
    };
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../consola/index.php#'.$Operacion.'");
        $conn->close();
        exit();
    } else {
        header("Location: ../consola/login.php");
        $conn->close();
        exit();
    }
}    


//ELIMINAR: CATEGORIA
$Operacion="Categoria";
if (isset($_POST['Eliminar'.$Operacion.''])) {
    //Post de datos
    $ID=$_POST['ID'.$Operacion.''];
    //Delete de fila segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "DELETE FROM ".$DBN."_".$Operacion.'s'." WHERE ID='".$ID."' ";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../consola/index.php#'.$Operacion.'");
        $conn->close();
        exit();
    }
    else 
    {
        header("Location: ../consola/login.php");
        $conn->close();
        exit();
    }
}

//CARGAR: Usuario
$Operacion="Usuario";
if (isset($_POST['Subir'.$Operacion.''])) {
    //Post de datos
    $Nombre = $_POST[''.$Operacion.'Nombre'];
    $Email = $_POST[''.$Operacion.'Email'];
    $Contrasena = md5($_POST[''.$Operacion.'Contrasena']);
    $Nivel= $_POST[''.$Operacion.'Nivel'];

    //Insert en Tabla - $DBN se modifica en:/server/datavase.php
    $sql = "INSERT INTO ".$DBN."_".$Operacion.'s'." (Nombre, Email, Contrasena, Level)
    VALUES ('$Nombre', '$Email', '$Contrasena' , '$Nivel')";
    $result = $conn->query($sql);
    $conn->close();

    if ($result) {
        header("Location: ../consola/index.php#'.$Operacion.'");
        
        exit();
    }
    else 
    {
        header("Location: ../consola/login.php");
        
        exit();
    }
}
    

//EDITAR: Categoria
$Operacion="Categoria";
if (isset($_POST['Editar'.$Operacion.''])) {
    //Post de datos
    $ID=$_POST['ID'.$Operacion.''];
    $Nombre = $_POST[''.$Operacion.'Nombre'];
    $Email = $_POST[''.$Operacion.'Email'];
    //Falta que chequee si es vacia no cargarla
    $Nivel= $_POST[''.$Operacion.'Nivel'];
    if ($_POST[''.$Operacion.'Contrasena']==$_POST[''.$Operacion.'ContrasenaOld']) {
        //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "UPDATE ".$DBN."_".$Operacion.'s'." SET  Nombre='".$Nombre."' , Email='".$Email."' , Level='".$Nivel."'  WHERE ID='".$ID."' ";
    }
    else 
    {
        $Contrasena = md5($_POST[''.$Operacion.'Contrasena']);
        //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "UPDATE ".$DBN."_".$Operacion.'s'." SET  Nombre='".$Nombre."' , Email='".$Email."' , Contrasena='".$Contrasena."' , Level='".$Nivel."'  WHERE ID='".$ID."' ";
    }

    
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../consola/index.php#'.$Operacion.'");
        $conn->close();
        exit();
    } else {
        header("Location: ../consola/login.php");
        $conn->close();
        exit();
    }
}   
           
        //ELIMINAR: Usuario
$Operacion="Usuario";
if (isset($_POST['Eliminar'.$Operacion.''])) {
    //Post de datos
    $ID=$_POST['ID'.$Operacion.''];
    //Delete de fila segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "DELETE FROM ".$DBN."_".$Operacion.'s'." WHERE ID='".$ID."' ";
    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../consola/index.php#'.$Operacion.'");
        $conn->close();
        exit();
    }
    else 
    {
        header("Location: ../consola/login.php");
        $conn->close();
        exit();
    }
}


?>