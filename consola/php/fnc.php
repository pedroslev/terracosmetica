<?php 
include '../Server/database.php';


function MostradorDeProductos(){
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
  }}

?>