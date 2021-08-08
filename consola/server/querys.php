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
            $anio=date('y');
            $mes=date('n');
            $dia=date('d');
            $hora=date('g');
            $minutos=date('');
            $segundos=date('i');
            $milisegundos=date('v');
            $unique=$anio.$mes.$dia.$hora.$minuto.$segundos.$milisegundos."_";
            //Seteo carpeta a guardar y nombres
            
           
            $target_file[$i] =  basename($unique.$_FILES['file']['name'][$i]);
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
                if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_dir . $target_file[$i]))
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
$CargaImagen=0;

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
        
       


        //Subir IMAGEN PRODUCTO 1    
        if ($_FILES['CargarImagen1']['size'] != 0) {
            
                    $target_file =basename($_FILES["CargarImagen1"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if ($_FILES["CargarImagen1"]["size"] > 100000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allowance de formatos unicos jpeg o png
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") 
            {
                echo "Unicamente JPG, JPEG o PNG son permitidos.";
                $uploadOk = 0;
            } 

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["CargarImagen1"]["tmp_name"],$target_dir.$target_file)) {
                echo "ok";
                } else {
                echo "Sorry, there was an error uploading your file.";
                }
            }

        }
         //Subir IMAGEN PRODUCTO 2   
         if ($_FILES['CargarImagen2']['size'] != 0) {
           
                    $target_file2 =basename($_FILES["CargarImagen2"]["name"]);
                    $uploadOk2 = 1;
                    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

            if ($_FILES["CargarImagen2"]["size"] > 100000) {
                echo "Sorry, your file is too large2.";
                $uploadOk2 = 0;
            }

            // Allowance de formatos unicos jpeg o png
            if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") 
            {
                echo "Unicamente JPG, JPEG o PNG son permitidos2.";
                $uploadOk2 = 0;
            } 

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk2 == 0) {
                echo "Sorry, your file was not uploaded2.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["CargarImagen2"]["tmp_name"],$target_dir.$target_file2)) {
                echo "ok";
                } else {
                echo "Sorry, there was an error uploading your file2.";
                }
            }

        }
        //Subir IMAGEN PRODUCTO 3   
        if ($_FILES['CargarImagen3']['size'] != 0) {
            
                    $target_file3 =basename($_FILES["CargarImagen3"]["name"]);
                    $uploadOk3 = 1;
                    $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

            if ($_FILES["CargarImagen3"]["size"] > 100000) {
                echo "Sorry, your file is too large3.";
                $uploadOk3 = 0;
            }

            // Allowance de formatos unicos jpeg o png
            if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") 
            {
                echo "Unicamente JPG, JPEG o PNG son permitidos3.";
                $uploadOk3 = 0;
            } 

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk3 == 0) {
                echo "Sorry, your file was not uploaded3.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["CargarImagen3"]["tmp_name"],$target_dir.$target_file3)) {
                echo "ok";
                } else {
                echo "Sorry, there was an error uploading your file3.";
                }
            }

        }
        //Subir IMAGEN PRODUCTO 4   
        if ($_FILES['CargarImagen4']['size'] != 0) {
            
                    $target_file4 = basename($_FILES["CargarImagen4"]["name"]);
                    $uploadOk4 = 1;
                    $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));

            if ($_FILES["CargarImagen4"]["size"] > 100000) {
                echo "Sorry, your file is too large4.";
                $uploadOk4 = 0;
            }

            // Allowance de formatos unicos jpeg o png
            if($imageFileType4 != "jpg" && $imageFileType4 != "png" && $imageFileType4 != "jpeg") 
            {
                echo "Unicamente JPG, JPEG o PNG son permitidos4.";
                $uploadOk4 = 0;
            } 

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk4 == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["CargarImagen4"]["tmp_name"],$target_dir.$target_file4)) {
                echo "ok";
                } else {
                echo "Sorry, there was an error uploading your file4.";
                }
            }

        }
        //Subir IMAGEN PRODUCTO 5   
        if ($_FILES['CargarImagen5']['size'] != 0) {
            
                    $target_file5 = basename($_FILES["CargarImagen5"]["name"]);
                    $uploadOk5 = 1;
                    $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));

            if ($_FILES["CargarImagen5"]["size"] > 100000) {
                echo "Sorry, your file is too large5.";
                $uploadOk5 = 0;
            }

            // Allowance de formatos unicos jpeg o png
            if($imageFileType5 != "jpg" && $imageFileType5 != "png" && $imageFileType5 != "jpeg") 
            {
                echo "Unicamente JPG, JPEG o PNG son permitidos5.";
                $uploadOk5 = 0;
            } 

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded5.";
            // if everything is ok, try to upload file
            } else {
                
                if (move_uploaded_file($_FILES["CargarImagen5"]["tmp_name"],$target_dir.$target_file5)) {
                echo "ok";
                } else {
                echo "Sorry, there was an error uploading your file5.";
                }
            }

        }

        if ($_FILES['CargarImagen1']['size'] != 0) {$Imagen1=", Imagen1='".$target_file."'"; $CargaImagen=1;} else {$Imagen1=NULL;}
        if ($_FILES['CargarImagen2']['size'] != 0) {$Imagen2=", Imagen2='".$target_file2."'"; $CargaImagen=1;} else {$Imagen2=NULL;}
        if ($_FILES['CargarImagen3']['size'] != 0) {$Imagen3=", Imagen3='".$target_file3."'"; $CargaImagen=1;} else {$Imagen3=NULL;}
        if ($_FILES['CargarImagen4']['size'] != 0) {$Imagen4=", Imagen4='".$target_file4."'"; $CargaImagen=1;} else {$Imagen4=NULL;}
        if ($_FILES['CargarImagen5']['size'] != 0) {$Imagen5=", Imagen5='".$target_file5."'"; $CargaImagen=1;} else {$Imagen5=NULL;}

        $sql = "UPDATE ".$DBN."_".$Operacion." SET  Codigo='".$Codigo."' , Nombre='".$Nombre."' , Descripcion='".$Descripcion."' ,
        Stock='".$Stock."' , Categoria='".$Categoria."' , Categoria2='".$Categoria2."' , Categoria3='".$Categoria3."' , Costo='".$Costo."' , Margen='".$Margen."' , Precio='".$Precio."' , Oferta='".$Oferta."', Mostrar='".$Mostrar."'  
        ".
        $Imagen1.$Imagen2.$Imagen3.$Imagen4.$Imagen5
        ." WHERE ID='".$ID."' ";
        $result = $conn->query($sql);
        if ($result) {
            if($CargaImagen=1){header("Location: ../index.php?idprod=".$ID."#EditarProducto");}else{header("Location: ../index.php#Productos");}
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
      
    $sql = "UPDATE ".$DBN."_Productos SET  Eliminar='1' WHERE ID='".$IDProducto."' ";

    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../index.php#Productos");
        $conn->close();
        exit();
    } else {
        header("Location: ../login.php");
        $conn->close();
        exit();
    }
        
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
    
    //Insert en Tabla - $DBN se modifica en:/server/datavase.php
    $sql = "INSERT INTO ".$DBN."_".$Operacion.'s'." (Nombre, Email, Contrasena)
    VALUES ('$Nombre', '$Email', '$Contrasena')";
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
    
    if ($_POST[''.$Operacion.'Contrasena']==$_POST[''.$Operacion.'ContrasenaOld']) {
        //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "UPDATE ".$DBN."_".$Operacion.'s'." SET  Nombre='".$Nombre."' , Email='".$Email."'  WHERE ID='".$ID."' ";
    }
    else 
    {
        $Contrasena = md5($_POST[''.$Operacion.'Contrasena']);
        //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "UPDATE ".$DBN."_".$Operacion.'s'." SET  Nombre='".$Nombre."' , Email='".$Email."' , Contrasena='".$Contrasena."'  WHERE ID='".$ID."' ";
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
        header("Location: ../../../login.php");
        $conn->close();
        exit();
    }
}

//---------------LOGOUT--------------------
if (isset($_POST['LogOut'])) {

unset($_SESSION['IDUsuario']);
unset($_SESSION['NombreUsuario']);
unset($_SESSION['NivelUsuario']);

// destroy the session
session_destroy();

header("Location: ./login.php");
$conn->close();}
   
//Eliminar Imagen de producto en Pagina de edicion

// continuar para siguientes imagenes, tambien eliminar imagen del ftp
if (isset($_POST['EliminarImagen1'])) {
    $ID= $_POST['ID'];
    $sql = "UPDATE TERRA_Productos SET Imagen1= NULL WHERE ID='".$ID."' ";
    $result = $conn->query($sql);

    if ($result) {
    header("Location: ../index.php?idprod=".$ID."#EditarProducto");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../signin.html");
    $conn->close();}
}

if (isset($_POST['EliminarImagen2'])) {
    $ID= $_POST['ID'];
    $sql = "UPDATE TERRA_Productos SET Imagen2= NULL WHERE ID='".$ID."' ";
    $result = $conn->query($sql);
    
    if ($result) {
    header("Location: ../index.php?idprod=".$ID."#EditarProducto");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../signin.html");
    $conn->close();}
}

if (isset($_POST['EliminarImagen3'])) {
    $ID= $_POST['ID'];
    $sql = "UPDATE TERRA_Productos SET Imagen3= NULL WHERE ID='".$ID."' ";
    $result = $conn->query($sql);
    
    if ($result) {
    header("Location: ../index.php?idprod=".$ID."#EditarProducto");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../signin.html");
    $conn->close();}
}

if (isset($_POST['EliminarImagen4'])) {
    $ID= $_POST['ID'];
    $sql = "UPDATE TERRA_Productos SET Imagen4= NULL WHERE ID='".$ID."' ";
    $result = $conn->query($sql);
    
    if ($result) {
    header("Location: ../index.php?idprod=".$ID."#EditarProducto");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../signin.html");
    $conn->close();}
}


if (isset($_POST['EliminarImagen5'])) {
    $ID= $_POST['ID'];
    $sql = "UPDATE TERRA_Productos SET Imagen5= NULL WHERE ID='".$ID."' ";
    $result = $conn->query($sql);
    
    if ($result) {
    header("Location: ../index.php?idprod=".$ID."#EditarProducto");
    $conn->close();
    exit();
    }
    else 
    {
    header("Location: ../signin.html");
    $conn->close();}
}

//---------------VENTAS--------------------

//EDITAR: Estado Ventas
if (isset($_POST['EditarEstado'])) {
    //Post de datos
    $ID=$_POST['IDVentas'];
    $Estado=$_POST['EditarEstado'];
 
    //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
    $sql = "UPDATE ".$DBN."_Ventas SET Estado='".$Estado."'  WHERE ID='".$ID."' ";

    $result = $conn->query($sql);

    if ($result) {
        header("Location: ../index.php#Ventas");
        $conn->close();
        exit();
    } else {
        header("Location: ../login.php");
        $conn->close();
        exit();
    }
} 

//---------------Edicion Rapida--------------------
if (isset($_POST['EdicionRapida'])) {
    //Post de datos
    $Oferta=$_POST['Oferta'];
    $Margen=$_POST['Margen'];
    $Stock=$_POST['Stock'];

    $IDs = json_decode($_POST['IDCheck']);
    $CantProd = $_POST['CantProd'];
 //FALTA HACER QUE CUANDO UNA VARIABLE VENGA VACIA NO LA MODIFIQUE EN DB  
    for ($i=0; $i < $CantProd; $i++) {
        //Update en Tabla segun ID - $DBN se modifica en:/server/datavase.php
        $ID = $IDs[$i];
        $sql = "UPDATE ".$DBN."_Productos SET Oferta='".$Oferta."', Stock='".$Stock."' , Margen='".$Margen."' WHERE ID='".$ID."' ";
        $result = $conn->query($sql);
    }
}


?>