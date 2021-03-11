<?php 
include './Server/database.php';

include './Server/querys.php';

include './php/fnc.php';

session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Terra Consola</title>
	<meta name="author" content="HAZEinc.">
	<meta name="description" content="Ventas online y control de stock">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="icon" type="image/x-icon" href="./media/favicon.png"/>
	
  <link rel="stylesheet" href="./css/style.css">
  <script src="./js/index.js"></script>
  
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0"> 
      <a class="text-center navbar-brand col-sm-3 col-md-2 mr-0" href="#">Demo Terracosmetica</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="login.php">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#Inicio" id="Inicio" name="Inicio" onclick="Seleccionar(selected=0)">
                  <span data-feather="home"></span>
                  Inicio
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#Ventas" id="Ventas" onclick="Seleccionar(selected=1)">
                  <span data-feather="dollar-sign"></span>
                  Ventas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Productos" id="Productos" onclick="Seleccionar(selected=2)">
                  <span data-feather="gift"></span>
                  Productos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Categorias" id="Categorias" onclick="Seleccionar(selected=8)">
                  <span data-feather="filter"></span>
                  Categorias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Reportes" id="Reportes" onclick="Seleccionar(selected=3)">
                  <span data-feather="bar-chart-2"></span>
                  Reportes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#Configuracion" id="Configuracion" onclick="Seleccionar(selected=5)">
                  <span data-feather="settings"></span>
                  Configuracion
                </a>
              </li>
            </ul>
            <div class="fixed-bottom Marca">
            <a href="http://hazear.com/" target="_blank"><strong>HAZE</strong></a>
            <h1 class="h2"><strong>S O V</strong></h1>
            <p>Version T0.0.1</p>
          </div>
          </div>

        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
          <!-- INICIO -->
          <div class="" id="InicioTitulo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Inicio</h1>
            </div>
            Bienvenido a la interfaz de Administrador de HAZE S.O.V. (Sistema de Organización de Ventas)
            </div>
            
          <!-- VENTAS -->
          <div class="Ocultar" id="VentasTitulo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Ventas</h1>
            </div>
             En desarrollo...
            </div>
 
        
          <!-- PRODUCTOS -->
            <div class="Ocultar" id="ProductosTitulo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Productos</h1>
            <button type="button" class="btn btn-outline-dark" onclick="Seleccionar(selected=4)">Agregar Producto</button>
            </div>
            <div class="table-responsive">
                              <table class="table table-striped table-sm">
                                <thead>
                                  <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Categoria</th>
                                    <th>Costo</th>                                    
                                    <th>MargenML</th>                                   
                                    <th>PrecioML</th>
                                    <th></th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                  <?php 
                        //MOSTRADOR DE PRODUCTOS (LISTADO)
                        $class="FormLista";
                        $sql ="SELECT * FROM ".$DBN."_Productos";
                        $result= $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                               ?>                     
<tr>
    <form action="index.php#Productos" method="post" id="EditarProducto<?php echo $row["ID"]; ?>">                    
        <td><?php echo $row["Codigo"]; ?></td>
        <td><?php echo $row["Nombre"]; ?></td>                            
        <td><?php echo $row["Stock"]; ?></td>
        <td><?php echo $row["Categoria"]; ?></td>
        <td>$<input name="CostoProducto" type="text"  onchange="document.getElementById('EditarProducto<?php echo $row["ID"]; ?>').submit()" class="FormLista" value="<?php echo $row["Costo"]; ?>"></td>
        <td>%<input name="MargenMLProducto" type="text"  onchange="document.getElementById('EditarProducto<?php echo $row["ID"]; ?>').submit()" class="FormLista" value="<?php echo $row["MargenML"]; ?>"></td>
        <td>$<input name="PrecioMLProducto" type="text"  onchange="document.getElementById('EditarProducto<?php echo $row["ID"]; ?>').submit()" class="FormLista" value="<?php echo $row["PrecioML"]; ?>"></td>
        <input type="hidden" name="IDProducto" value="<?php echo $row["ID"]; ?>" />
        <input type="hidden" name="EditarProducto" value="set" />
    </form>
    <td> 
        <button class="btn btn-light" name="EditarProducto" onclick=".submit()"><span data-feather="edit"></span></button>
    </td> 
    <td>                 
        <form action="index.php#Productos" method="post">
            <input type="hidden" name="IDProducto" value="<?php echo $row["ID"]; ?>" />
            <button class="btn btn-light" name="EliminarProducto" onclick=".submit()"><span data-feather="trash-2"></span></button>
        </form>                                    
    </td> 
</tr>
                         <?php   } } else {  ?>
                            <tr>
                            NO HAY PRODUCTOS
                            <tr>
                      <?php     }   ?>             
                  </tbody>
                </table>
              </div>
            </div>
            



            <!-- FORMULARIO DE CARGA DE PRODUCTOS-->
            <div class="Ocultar" id="AgregarProducto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Agregar Producto</h1>
            <button type="button" class="btn btn-outline-dark" onclick="Seleccionar(selected=2)">X</button>
            </div>
            <form method="POST">
              <div class="form-row">
                <div class="col-1">
                  <label for="Codigo">Codigo</label>
                    <input type="text" class="form-control  mb-2" id="Codigo" placeholder="#PROD" required name="Codigo">
                </div>
                <div class="col">
                <label for="Nombre">Nombre</label>
                  <input type="text" class="form-control mb-2" name="Nombre" id="Nombre" placeholder="Nombre" required>
                  </div>
                  <div class="col">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" class="form-control mb-2" id="Descripcion" placeholder="Descripcion" name="Descripcion" required>
                </div>
                </div>
               
                <div class="form-row">
                 <div class="col-1">
                  <label for="Cantidad">Cantidad</label>
                    <input type="text" class="form-control mb-2" id="Cantidad" name="Cantidad" placeholder="Cantidad" required>
                </div>
                <div class="col">
                  <label for="Categoria">Categoria</label>
                    <select class="form-control" id="Categoria" name="Categoria" required>
                    <?php 
                        //MOSTRADOR DE CATEGORIAS EN CARGA DE PRODUCTOS
                        $sql ="SELECT Nombre FROM ".$DBN."_Categorias";
                        $result= $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              echo "<option>" .$row["Nombre"]. "</option>";
                            }
                          } else {
                            echo "<option> - </option>";
                          }
                    ?>
                    </select>
                </div>
    
                 </div>
                <div class="form-row">
                <div class="col">
                  <label for="Costo">Costo</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control" id="Costo" name="Costo" value="" placeholder="Costo" onchange="CalculoPrecioSov()" >
                  </div>
                </div>
                
                <div class="col">
                  <label for="MargenML">MargenML</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">%</div>
                    </div>
                    <input type="text" class="form-control" id="MargenML" name="MargenML" placeholder="100" value="0" onchange="CalculoPrecioML()">
                  </div>
                </div>
             
                <div class="col">
                  <label for="PrecioML">PrecioML</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control" id="PrecioML" name="PrecioML" placeholder="PrecioML">
                  </div>
                </div>
                </div>

                
              
                <div class="form-row">
                <div class="col">
                  
                  <button type="submit" class="btn btn-primary mb-2" name="SubirAWebSC" onclick="LimpiarForm(), Seleccionar(selected=5)">Seguir Cargando</button>
                  <button type="submit" class="btn btn-success mb-2" name="SubirAWeb">Subir a la Web</button>
                </div>
              </div>
            </form>
            </div>
          <!-- FIN DEL FORMULARIO DE CARGA DE PRODUCTOS -->


          <!-- CATEGORIAS -->
          <div class="Ocultar" id="CategoriasTitulo">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Categorias</h1>
            <!-- FORM DE CATEGORIA -->
            <form method="POST" class="form-inline">
            <input type="text" class="form-control mb-2 mr-sm-2" id="NombreCategoria" name="CategoriaNombre" required placeholder="NombreCategoria">
                <div class="input-group  mb-2 mr-sm-2">
                <input type="text" class="form-control" id="IconoCategoria" name="CategoriaIcono" placeholder="Pegue Aqui Nombre del icono">
                <div class="input-group-append">
    <a href="https://feathericons.com/" class="btn btn-outline-secondary" target="_blank">+</a>
  </div>
                </div>
           <button type="submit" class="btn btn-success mb-2" name="SubirCategoria">Agregar</button>
            </form>
            <!-- FIN DE FORM DE CATEGORIA -->
            </div>
              
            <!-- LISTADO DE CATEGORIAS-->
            <div class="table-responsive">
                              <table class="table table-striped table-sm">
                                <thead>
                                  <tr>
                                    <th>Icono</th>
                                    <th>Nombre</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                  <?php 
                        $sql ="SELECT * FROM ".$DBN."_Categorias";
                        $result= $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              //HAY QUE AGREGAR ENCABEZADO PARA QUE SI NO HAY CATEGORIAS NO LO MUESTRE
                              ?> 
                        <tr>
                             <form action="index.php#Categorias" method="post" id="EditarCategoria<?php echo $row["ID"]; ?>">
                            <td>   
                               
                                <span data-feather="<?php echo $row["Icono"]; ?>"></span>
                                <input class="FormLista" name="CategoriaEditIcono" type="text"  value="<?php echo $row["Icono"]; ?>" aria-label="..." onchange="document.getElementById('EditarCategoria<?php echo $row['ID']; ?>').submit()" >
                            </td>
                            <td>
                                
                                    <input class="FormLista" name="CategoriaEditNombre" type="text" required value="<?php echo $row["Nombre"]; ?>" aria-label="..." onchange="document.getElementById('EditarCategoria<?php echo $row['ID']; ?>').submit()">
                                    <input type="hidden" name="IDCategoria" value="<?php echo $row["ID"]; ?>" />
                                    <input type="hidden" name="EditarCategoria" value="set" />
                                
                            </td> 
                                </form>
                            <td>                 
                                <form action="index.php#Categorias" method="post">
                                    <input type="hidden" name="IDCategoria" value="<?php echo $row["ID"]; ?>" />
                                    <button class="btn btn-light" name="EliminarCategoria" onclick=".submit()"><span data-feather="trash-2"></span></button>
                                </form>                                    
                            </td>                                                                          
                        </tr>
                         <?php   } } else {  ?>
                            <tr>
                            NO HAY CATEGORIAS
                            <tr>
                      <?php     }   ?>
                  </tbody>
                </table>
              </div>
              </div> 

          <!-- REPORTES -->
          <div class="Ocultar" id="ReportesTitulo">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Reportes</h1>
            </div>
             En desarrollo
              </div> 

          <!-- Configuracion -->
          <div class="Ocultar" id="ConfiguracionTitulo">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Usuarios</h1>
                 <!-- FORM DE Ususarios -->
                    <form method="POST" class="form-inline">
                        <input type="text" class="form-control mb-2 mr-sm-2" id="UsuarioNombre" name="UsuarioNombre" required placeholder="Nombre">
                        <input type="email" class="form-control mb-2 mr-sm-2" id="UsuarioEmail" name="UsuarioEmail" required placeholder="Email">
                        <input type="text" class="form-control mb-2 mr-sm-2" id="UsuarioContrasena" name="UsuarioContrasena" required placeholder="Contraseña">
                        <input type="text" class="form-control mb-2 mr-sm-2" id="UsuarioNivel" name="UsuarioNivel" required placeholder="Nivel">
                        <button type="submit" class="btn btn-success mb-2" name="SubirUsuario">Agregar</button>
                   </form>
                    <!-- FIN DE FORM DE Ususarios-->
                </div>
                    <div class="table-responsive">
                                  <table class="table table-striped table-sm">
                                    <thead>
                                      <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Contraseña</th>
                                        <th>Nivel</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                      <?php 
                            //MOSTRADOR DE PRODUCTOS (LISTADO)
                            $class="FormLista";
                            $sql ="SELECT * FROM ".$DBN."_Usuarios";
                            $result= $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                   ?>                     
                                        <tr>
                                           <td><?php echo $row["ID"]; ?></td>
                                            <form action="index.php#Usuarios" method="post" id="EditarUsuario<?php echo $row["ID"]; ?>">                    
                                                <td><input name="UsuarioNombre" type="text"  onchange="document.getElementById('EditarUsuario<?php echo $row['ID']; ?>').submit()" class="FormLista" value="<?php echo $row["Nombre"]; ?>"></td>
                                                <td><input name="UsuarioEmail" type="email"  onchange="document.getElementById('EditarUsuario<?php echo $row['ID']; ?>').submit()" class="FormLista" value="<?php echo $row["Email"]; ?>"></td>
                                                <td><input name="UsuarioContrasena" type="password"  onchange="document.getElementById('EditarUsuario<?php echo $row['ID']; ?>').submit()" class="FormLista" value="<?php echo $row["Contrasena"]; ?>"></td>
                                                <td><input name="UsuarioNivel" type="text"  onchange="document.getElementById('EditarUsuario<?php echo $row['ID']; ?>').submit()" class="FormLista" value="<?php echo $row["Level"]; ?>"></td>
                                                <input type="hidden" name="IDUsuario" value="<?php echo $row["ID"]; ?>" />
                                                <input type="hidden" name="UsuarioContrasenaOld" value="<?php echo $row["Contrasena"]; ?>" />
                                                <input type="hidden" name="EditarUsuario" value="set" />
                                            </form>                                            
                                            <td>                 
                                                <form action="index.php#Usuarios" method="post">
                                                    <input type="hidden" name="IDUsuario" value="<?php echo $row["ID"]; ?>" />
                                                    <button class="btn btn-light" name="EliminarUsuario" onclick=".submit()"><span data-feather="trash-2"></span></button>
                                                </form>                                    
                                            </td> 
                                        </tr>
                             <?php   } } else {  ?>
                                <tr>
                                NO HAY Ususarios
                                <tr>
                          <?php     }   ?>             
                      </tbody>
                    </table>
                  </div>
          </div> 


        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>



</html>