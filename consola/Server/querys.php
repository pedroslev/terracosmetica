<?php

include './database.php';
//---------------SECCION PRODUCTOS--------------------
//CARGAR PRODUCTO
if (isset($_POST['SubirAWeb'])) {

    $Codigo= $_POST['Codigo'];
    $Nombre=$_POST['Nombre'];
    $Descripcion=$_POST['Descripcion'];
    $Stock=$_POST['Stock'];
    $Categoria=$_POST['Categoria'];
    $Categoria2=$_POST['Categoria2'];
    $Categoria3=$_POST['Categoria3'];
    $Costo=$_POST['Costo'];
    $Margen=$_POST['Margen'];
    $Precio=$_POST['Precio'];
    $Oferta=$_POST['Oferta'];
    $Mostrar=$_POST['Mostrar'];

    // Conteo total de archivos
    $countfiles = count($_FILES['file']['name']);
    if($countfiles>5)
    {
        echo "Maximo de 5 imagenes";
    } else 
    {
    
    // Loopeo por la cantidad de fotos que hay
    for($i=0;$i<$countfiles;$i++)
        {
    
            //Seteo carpeta a guardar y nombres
            $target_dir = "/home/u839063682/public_html/pedro_html/media/";
            $basename = basename($_FILES['file']['name'][$i]);
            $target_file[$i] = $target_dir . $basename;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file[$i],PATHINFO_EXTENSION));
            
            // Allowance de formatos unicos jpeg o png
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
            {
                echo "Unicamente JPG, JPEG o PNG son permitidos.";
                $uploadOk = 0;
            } 
            //else 
            //{
                if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_file[$i]))
                {
                echo "El archivo ". htmlspecialchars( basename($_FILES['file']['name'][$i])). " fue cargado exitosamente.";
                }
                else
                {
                echo "Lo sentimos, ha ocurrido un error.";
                }
            //}
        }
    }
    //Declaro variables singulares para guardar cada valor del array
    $imagen1=$target_file[0];
    $imagen2=$target_file[1];
    $imagen3=$target_file[2];
    $imagen4=$target_file[3];
    $imagen5=$target_file[4];

    //Calculo la cantidad de imagenes vacias a partir del maximo de imagenes permitidas(5)
    $NumberOfFilesLeft= 5 - $countfiles;
    //A partir del resultado, dejo en null los campos a ocupar por imagenes que no se subieron para muestreo en html
    switch($NumberOfFilesLeft){
        case 1:
            $imagen5=NULL;
        break;

        case 2:
            $imagen4=NULL;
            $imagen5=NULL;
        break;

        case 3:
            $imagen3=NULL;
            $imagen4=NULL;
            $imagen5=NULL;
        break;

        case 4:
            $imagen2=NULL;
            $imagen3=NULL;
            $imagen4=NULL;
            $imagen5=NULL;
        break;

        case 5:
            $imagen1=NULL;
            $imagen2=NULL;
            $imagen3=NULL;
            $imagen4=NULL;
            $imagen5=NULL;
        break;
    }
    if($countfiles)
    //mysql query
    $sql = "INSERT INTO TERRA_Productos (Codigo, Nombre, Descripcion, Stock, Categoria, Categoria2, Categoria3, Costo, Margen, Precio, Oferta, Imagen1, Imagen2, Imagen3, Imagen4, Imagen5, Mostrar)
    VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Stock', '$Categoria', '$Categoria2', '$Categoria3', '.$Costo.', '.$Margen.', '$Precio', '.$Oferta.', '$imagen1', '$imagen2', '$imagen3', '$imagen4', '$imagen5', '$Mostrar')";
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
    $Operacion="Productos";
        if (isset($_POST['EditarProducto'])) {
        $ID=$_POST['ID'];    
        $Codigo= $_POST['Codigo'];
        $Nombre=$_POST['Nombre'];
        $Descripcion=$_POST['Descripcion'];
        $Stock=$_POST['Stock'];
        $Categoria=$_POST['Categoria'];
        $Categoria2=$_POST['Categoria2'];
        $Categoria3=$_POST['Categoria3'];
        $Costo=$_POST['Costo'];
        $Margen=$_POST['Margen'];
        $Precio=$_POST['Precio'];
        $Oferta=$_POST['Oferta'];
        $Mostrar=$_POST['Mostrar'];  
        
        /*
        //Obtencion de id categoria
        $sqlID ="SELECT ID FROM TERRA_Categorias WHERE Nombre = '$Categoria'";
        $resultID= $conn->query($sqlID);
        $row = $resultID->fetch_assoc();
        if ($resultID->num_rows > 0) {
            $IdCategoria=$row["ID"];
        }*/
        
        $sql = "UPDATE ".$DBN."_".$Operacion." SET  Codigo='".$Codigo."' , Nombre='".$Nombre."' , Descripcion='".$Descripcion."' ,
        Stock='".$Stock."' , Categoria='".$Categoria."' , Categoria2='".$Categoria2."' , Categoria3='".$Categoria3."' , Costo='".$Costo."' , Margen='".$Margen."' , Precio='".$Precio."' , Oferta='".$Oferta."' , Mostrar='".$Mostrar."'  WHERE ID='".$ID."' ";
        $result = $conn->query($sql);
        echo $sql;
        if ($result) {
            header("Location: ../index.php#Productos");
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


    
//---------------SECCION CATEGORIA--------------------
//CARGAR CATEGORIA
$Operacion="Categoria";
if (isset($_POST['Subir'.$Operacion.''])) {
//Post de datos
$Nombre= $_POST[''.$Operacion.'Nombre'];

//Insert en Tabla - $DBN se modifica en:/server/datavase.php
$sql = "INSERT INTO ".$DBN."_".$Operacion.'s'." (Nombre)
VALUES ('$Nombre')";
$result = $conn->query($sql);
$conn->close();

    if ($result) {
        header("Location: ../index.php#Categorias");
        
        exit();
    }
    else 
    {
        header("Location: ../login.php");
        
        exit();
    }

}



//EDITAR: Categoria
$Operacion="Categoria";
if (isset($_POST['Editar'.$Operacion.''])) {
    //Post de datos
    $ID=$_POST['ID'.$Operacion.''];
    $Nombre=$_POST[''.$Operacion.'EditNombre'];
 
    //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "UPDATE ".$DBN."_".$Operacion.'s'." SET  Nombre='".$Nombre."'  WHERE ID='".$ID."' ";

    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../index.php#Categorias");
        $conn->close();
        exit();
    } else {
        header("Location: ../login.php");
        $conn->close();
        exit();
    }
}    


//ELIMINAR: CATEGORIA
$Operacion="Categoria";
if (isset($_POST['Eliminar'.$Operacion.''])) {
    //Post de datos
    $ID=$_POST['ID'.$Operacion.''];

    $sqlSC1 = "SELECT ID FROM ".$DBN."_Productos WHERE Categoria='".$ID."' ";
    $resultSC1 = $conn->query($sqlSC1);
    $rowSC1 = $resultSC1->fetch_assoc();
    if($resultSC1->num_rows > 0){
        $sqlUC1 = "UPDATE ".$DBN."_Productos SET Categoria=NULL , aux1='1' WHERE ID='".$rowSC1['ID']."' ";
        $resultUC1 = $conn->query($sqlUC1);
    }

    $sqlSC2 = "SELECT ID FROM ".$DBN."_Productos WHERE Categoria2='".$ID."' ";
    $resultSC2 = $conn->query($sqlSC2);
    $rowSC2 = $resultSC2->fetch_assoc();
    if($resultSC2->num_rows > 0){
        $sqlUC2 = "UPDATE ".$DBN."_Productos SET Categoria2=NULL , aux1='1' WHERE ID='".$rowSC2['ID']."' "; 
        $resultUC2 = $conn->query($sqlUC2);
    }

    $sqlSC3 = "SELECT ID FROM ".$DBN."_Productos WHERE Categoria3='".$ID."' ";
    $resultSC3 = $conn->query($sqlSC3);
    $rowSC3 = $resultSC3->fetch_assoc();
    if($resultSC3->num_rows > 0){
        $sqlUC3 = "UPDATE ".$DBN."_Productos SET Categoria3=NULL , aux1='1' WHERE ID='".$rowSC3['ID']."' "; 
        $resultUC3 = $conn->query($sqlUC3);
    }

    //Delete de fila segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "DELETE FROM ".$DBN."_".$Operacion.'s'." WHERE ID='".$ID."' ";
    $result = $conn->query($sql);
    if ($result) {
        header("Location: ../index.php#Categorias");
        $conn->close();
        exit();
    }
    else 
    {
        header("Location: ../login.php");
        $conn->close();
        exit();
    }
}


//---------------SECCION USUARIOS--------------------
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
        header("Location: ../index.php#Configuracion");
        exit();
    }
    else 
    {
        header("Location: ../login.php");
        exit();
    }
}


//EDITAR: Usuario
$Operacion="Usuario";
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
        header("Location: ../index.php#Configuracion");
        $conn->close();
        exit();
    } else {
        header("Location: ../login.php");
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
        header("Location: ../index.php#Configuracion");
        $conn->close();
        exit();
    }
    else 
    {
        header("Location: ../login.php");
        $conn->close();
        exit();
    }
}


?>