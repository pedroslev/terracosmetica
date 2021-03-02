<?php 
include './Server/database.php';

include './Server/querys.php';

include './php/fnc.php';

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Haze SOV</title>
	<meta name="author" content="HAZEinc.">
	<meta name="description" content="Ventas online y control de stock">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="css/style.css">
	<link rel="icon" type="image/x-icon" href="./media/favicon.png"/>
	
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="./js/index.js"></script>
  
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0"> 
      <a class="text-center navbar-brand col-sm-3 col-md-2 mr-0" href="#">SOV DEMO</a>
      
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="signin.html">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="#Inicio" id="Inicio" onclick="Seleccionar(selected=0)">
                  <span data-feather="home"></span>
                  Inicio
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#Facturacion" id="Facturacion" onclick="Seleccionar(selected=6)">
                  <span data-feather="shopping-cart"></span>
                  Facturacion
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
                <a class="nav-link" href="#Proveedores" id="Proveedores" onclick="Seleccionar(selected=7)">
                  <span data-feather="truck"></span>
                  Proveedores
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
            <div class="text-center Marca">
            <a href="http://hazear.com/" target="_blank"><strong>HAZE</strong></a>
            <h1 class="h2"><strong>S O V</strong></h1>
            <p>Version 0.0</p>
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
            
          <!-- FACTURACION -->
          <div class="Ocultar" id="FacturacionTitulo">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Facturacion</h1>
            </div>
         

            <!-- FORMULARIO BUSQUEDA DE PRODUCTOS -->
            <form method="POST">
              <div class="form-row">
                <div class="col-1">
                  <label for="Codigo">Codigo</label>
                    <input type="text" class="form-control  mb-2" id="CodigoBuscar" placeholder="#PROD" name="CodigoBuscar">
                </div>
      
                <div class="col">
                <label for="Nombre">Nombre</label>
                  <input type="text" class="form-control mb-2" name="NombreBuscar" id="NombreBuscar" placeholder="Nombre">
                </div>
                </div>
      
                <div class="col">
                  <label for="Categoria">Categoria</label>
                    <select class="form-control" id="CategoriaBuscar" name="CategoriaBuscar">
                    <?php 
                        //MOSTRADOR DE CATEGORIAS EN CARGA DE PRODUCTOS
                        $sql ="SELECT Nombre FROM SOV_Categorias";
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

                  <div class="col">
                  <label for="Proveedor">Proveedor</label>
                    <select class="form-control" id="ProveedorBuscar" name="ProveedorBuscar">
                    <?php 
                        //MOSTRADOR DE PROVEEDORES EN CARGA DE PRODUCTOS
                        $sqlProveedores ="SELECT Nombre FROM SOV_Proveedores";
                        $resultProveedores= $conn->query($sqlProveedores);
                        if ($resultProveedores->num_rows > 0) {
                            // output data of each row
                            while($row = $resultProveedores->fetch_assoc()) {
                              echo "<option>" .$row["Nombre"]. "</option>";
                            }
                          } else {
                            echo "<option> - </option>";
                          }                    
                    ?>
                    </select>
                </div>

                <div class="form-row">
                <div class="col">
                  <button type="submit" class="btn btn-success mb-2" name="BuscarProd">BUSCAR</button>
                </div>
              </div>
            </form>
            </div>


          
          <!-- FIN DEL FORMULARIO DE BUSQUEDA DE PRODUCTOS -->




      <?php
        //CARGAR CATEGORIA
        if (isset($_POST['BuscarProd'])) {

        $Codigo= $_POST['CodigoBuscar'];
        $Nombre= $_POST['NombreBuscar'];
        $Categoria= $_POST['CategoriaBuscar'];
        $Proveedor= $_POST['ProveedorBuscar'];

        $sql = "SELECT (*) FROM SOV_Productos WHERE Nombre like '%".$Nombre."%' OR Codigo like '%".$Codigo."%' OR Categoria like '%".$Categoria."%' OR Proveedor like '%".$Proveedor%."';";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            //HAY QUE AGREGAR ENCABEZADO PARA QUE SI NO HAY PRODUCTOS NO LO MUESTRE
            echo "                      
            <tr>                      
            <td><input  class='".$class."'  value='".$row["Codigo"]."'></td>
            <td><input  class='".$class."'  value='".$row["Nombre"]."'></td>
            <td>$<input  class='".$class."'  value='".$row["PrecioSov"]."'></td>
          </tr>";
          }
        } else {
          //FALTA HACER QUE SI NO HAY NADA MUESTRE UN MENSAJE DE NO HAY PRODUCTOS CARGADOS AUN.
          echo "NO HAY PRODUCTOS";
        }
      ?>



























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
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Categoria</th>
                                    <th>Proveedor</th>
                                    <th>Costo</th>
                                    <th>MargenSov</th>
                                    <th>MargenML</th>
                                    <th>PrecioSov</th>
                                    <th>PrecioML</th>
                                  </tr>
                                </thead>
                                <tbody>
                  <?php 
                        //MOSTRADOR DE PRODUCTOS (LISTADO)
                        $class="FormLista";
                        $sql ="SELECT Codigo, Nombre, Descripcion, Stock, Categoria, Proveedor, Costo, MargenSov, MargenML, PrecioSov, PrecioML FROM SOV_Productos";
                        $result= $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              //HAY QUE AGREGAR ENCABEZADO PARA QUE SI NO HAY PRODUCTOS NO LO MUESTRE
                              echo "                      
                              <tr>                      
                              <td><input  class='".$class."'  value='".$row["Codigo"]."'></td>
                              <td><input  class='".$class."'  value='".$row["Nombre"]."'></td>
                              <td><input  class='".$class."'  value='".$row["Descripcion"]."'></td>
                              <td><input  class='".$class."'  value='".$row["Stock"]."'></td>
                              <td><input  class='".$class."'  value='".$row["Categoria"]."'></td>
                              <td><input  class='".$class."'  value='".$row["Proveedor"]."'></td>
                              <td>$<input  class='".$class."'  value='".$row["Costo"]."'></td>
                              <td>%<input  class='".$class."'  value='".$row["MargenSov"]."'></td>
                              <td>%<input  class='".$class."'  value='".$row["MargenML"]."'></td>
                              <td>$<input  class='".$class."'  value='".$row["PrecioSov"]."'></td>
                              <td>$<input  class='".$class."'  value='".$row["PrecioML"]."'></td>
                            </tr>";
                            }
                          } else {
                            //FALTA HACER QUE SI NO HAY NADA MUESTRE UN MENSAJE DE NO HAY PRODUCTOS CARGADOS AUN.
                            echo "NO HAY PRODUCTOS";
                          }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="Ocultar" id="AgregarProducto">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Agregar Producto</h1>
            <button type="button" class="btn btn-outline-dark" onclick="Seleccionar(selected=2)">X</button>
            </div>




            <!-- FORMULARIO DE CARGA DE PRODUCTOS-->
            <form method="POST">
              <div class="form-row">
                <div class="col-1">
                  <label for="Codigo">Codigo</label>
                    <input type="text" class="form-control  mb-2" id="Codigo" placeholder="#PROD" name="Codigo">
                </div>
                <div class="col">
                <label for="Nombre">Nombre</label>
                  <input type="text" class="form-control mb-2" name="Nombre" id="Nombre" placeholder="Nombre">
                  </div>
                  <div class="col">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" class="form-control mb-2" id="Descripcion" placeholder="Descripcion" name="Descripcion">
                </div>
                </div>
               
                <div class="form-row">
                 <div class="col-1">
                  <label for="Cantidad">Cantidad</label>
                    <input type="text" class="form-control mb-2" id="Cantidad" name="Cantidad" placeholder="Cantidad">
                </div>
                <div class="col">
                  <label for="Categoria">Categoria</label>
                    <select class="form-control" id="Categoria" name="Categoria">
                    <?php 
                        //MOSTRADOR DE CATEGORIAS EN CARGA DE PRODUCTOS
                        $sql ="SELECT Nombre FROM SOV_Categorias";
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
                  <div class="col">
                  <label for="Proveedor">Proveedor</label>
                    <select class="form-control" id="Proveedor" name="Proveedor">
                    <?php 
                        //MOSTRADOR DE PROVEEDORES EN CARGA DE PRODUCTOS
                        $sqlProveedores ="SELECT Nombre FROM SOV_Proveedores";
                        $resultProveedores= $conn->query($sqlProveedores);
                        if ($resultProveedores->num_rows > 0) {
                            // output data of each row
                            while($row = $resultProveedores->fetch_assoc()) {
                              echo "<option>" .$row["Nombre"]. "</option>";
                            }
                          } else {
                            echo "<option> - </option>";
                          }
                          
                    ?>
                    </select>
                </div>
                  <div class="col">
                  <label for="LinkFoto">Link Foto</label>
                  <input type="text" class="form-control mb-2" id="LinkFoto" name="Link" placeholder="http:?????????.com/qwerty?">
                </div>
                </div>
                <div class="form-row">
                <div class="col">
                  <label for="Costo">Costo</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control" id="Costo" name="Costo" value="" placeholder="Costo" onchange="CalculoPrecioSov()">
                  </div>
                </div>
                  <div class="col">
                  <label for="MargenSov">MargenSov</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">%</div>
                    </div>
                    <input type="text" class="form-control" id="MargenSov" name="MargenSov" placeholder="100" value="0" onchange="CalculoPrecioSov()">
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
                  <label for="PrecioSov">PrecioSov</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control" id="PrecioSov" placeholder="PrecioSov">
                  </div>
                </div>
                <div class="col">
                  <label for="PrecioML">PrecioML</label>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">$</div>
                    </div>
                    <input type="text" class="form-control" id="PrecioML" placeholder="PrecioML">
                  </div>
                </div>
                </div>

                
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked>
                  <label class="form-check-label" for="defaultCheck1">
                    Mostrar en el Ecomerce
                  </label>
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

          <!-- PROVEEDORES -->
          <div class="Ocultar" id="ProveedoresTitulo">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Proveedores</h1>
            </div>
            <div>
            <h5>Agregar Proveedores</h5>

      <!-- LISTADO DE CATEGORIAS-->
      <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Telefono</th>
                </tr>
              </thead>
            <tbody>
            <?php 
                  $class="FormLista";
                  $sql ="SELECT Nombre, Telefono FROM SOV_Proveedores";
                  $result= $conn->query($sql);
                  if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        //HAY QUE AGREGAR ENCABEZADO PARA QUE SI NO HAY PROVEEDORES NO LO MUESTRE
                        echo "                      
                        <tr>                      
                        <td><input  class='".$class."'  value='".$row["Nombre"]."'></td>
                        <td><input  class='".$class."'  value='".$row["Telefono"]."'></td>
                      </tr>";
                      }
                    } else {
                      //FALTA HACER QUE SI NO HAY NADA MUESTRE UN MENSAJE DE NO HAY PROVEEDORES CARGADOS AUN.
                      echo "NO HAY CATEGORIAS";
                    }
              ?>
            </tbody>
          </table>
        </div>



            <!-- FORM DE PROVEEDORES -->
            <form method="POST">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">N</div>
              </div>
                <input type="text" class="form-control" id="ProveedorConf" name="ProveedorConf" placeholder="Proveedor">
            </div>
            
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">T</div>
              </div>
                <input type="text" class="form-control" id="ProveedorTelConf" name="ProveedorTelConf" placeholder="Telefono">
            </div>
            
            <div class="form-row">
                <div class="col">
                  <button type="submit" class="btn btn-success mb-2" name="SubirProveedor">Cargar Proveedor</button>
                </div>
              </div>
            </form>
            <!-- FIN DE FORM DE PROVEEDORES -->
            </div>
              </div> 
          
          
          <!-- CATEGORIAS -->
          <div class="Ocultar" id="CategoriasTitulo">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Categorias</h1>
            </div>
              
            <!-- LISTADO DE CATEGORIAS-->
            <div class="table-responsive">
                              <table class="table table-striped table-sm">
                                <thead>
                                  <tr>
                                    <th>Nombre</th>
                                  </tr>
                                </thead>
                                <tbody>
                  <?php 
                        $class="FormLista";
                        $sql ="SELECT Nombre FROM SOV_Categorias";
                        $result= $conn->query($sql);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                              //HAY QUE AGREGAR ENCABEZADO PARA QUE SI NO HAY CATEGORIAS NO LO MUESTRE
                              echo "                      
                              <tr>                      
                              <td><input  class='".$class."'  value='".$row["Nombre"]."'></td>
                            </tr>";
                            }
                          } else {
                            //FALTA HACER QUE SI NO HAY NADA MUESTRE UN MENSAJE DE NO HAY CATEGORIAS CARGADAS AUN.
                            echo "NO HAY CATEGORIAS";
                          }
                    ?>
                  </tbody>
                </table>
              </div>

            <!-- FORM DE CATEGORIA -->
            <div>
            <h5>Agregar Categoria</h5>
            <form method="POST">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">N</div>
              </div>
                <input type="text" class="form-control" id="NombreCategoria" name="NombreCategoria" placeholder="Cateogria">
            </div>
            
            <div class="form-row">
                <div class="col">
                  <button type="submit" class="btn btn-success mb-2" name="SubirCategoria">Cargar Categoria</button>
                </div>
              </div>
            </form>
            <!-- FIN DE FORM DE CATEGORIA -->
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
            <h1 class="h2">Configuracion</h1>
            </div>
                En desarrollo
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