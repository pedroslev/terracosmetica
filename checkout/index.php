<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
include '../server/database.php';
if (isset($_POST['CargaDB'])) {

	//carga de Cliente
		$Nombre= $_POST['Nombre'];
		$Apellido= $_POST['Apellido'];
		$TipoDoc= $_POST['TipoDoc'];
		$Documento= $_POST['Documento'];
		$Email= $_POST['Email'];
		$DirCalle= $_POST['DirCalle'];
		$DirNumero= $_POST['DirNumero'];
		$DirPostal= $_POST['DirPostal'];
		$DirDepartamento= $_POST['DirDepartamento'];
		$Provincia= $_POST['Provincia'];
		$Localidad= $_POST['Localidad'];
		$Observaciones= $_POST['Observaciones'];
		$Telefono= $_POST['Telefono'];
		$CantProds = $_POST['CantProd'];
		
		$sql = "INSERT INTO TERRA_Clientes (Nombre, Apellido, TipoDoc, Doc, Email, Calle, Altura, Postal, Departamento, Provincia, Localidad, Observaciones, Telefono) VALUES ('$Nombre', '$Apellido', '$TipoDoc', '$Documento', '$Email', '$DirCalle', '$DirNumero', '$DirPostal', '$DirDepartamento', '$Provincia', '$Localidad', '$Observaciones', '$Telefono')";
		$result = $conn->query($sql);
		$IDCliente = $conn->insert_id;//Guarda el ID cliente	
		
	// Fin de carga de Cliente

	//Carga de Productos	
		$PrecioTotal = 0;
		$anio=date('y');
		$mes=date('n');
		$dia=date('d');
		$hora=date('g');
		$minutos=date('');
		$segundos=date('i');
		$milisegundos=date('v');
		$CodigoPedido=$anio.$mes.$dia.$hora."_".$minuto.$segundos.$milisegundos;
		
		
		$IDs=json_decode($_POST['IDProd']);
		$PrecioFinal=json_decode($_POST['Precio']);

//FALTAA While para repetir dependiendo la cxant de productos
for ($i=0; $i < $CantProds; $i++) { 
	
	$PrecioTotal = $PrecioTotal + $PrecioFinal[$i];

	$sqlP = "INSERT INTO TERRA_Pedidos (CodigoPedido, IDProducto, PrecioFinal) VALUES ('$CodigoPedido', '$IDs[$i]', '$PrecioFinal[$i]')";
	$resultP = $conn->query($sqlP);
}
		

	//Fin Carga de Productos

	//Carga de Venta
		$Fecha= date("Ymd");

		$sqlV = "INSERT INTO TERRA_Ventas (IDCliente, CodigoPedido, PrecioTotal, Fecha, Estado) VALUES ('$IDCliente', '$CodigoPedido', '$PrecioTotal', '$Fecha', '1')";
		$resultV = $conn->query($sqlV);

	//Fin Carga de Productos


}
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-5216061197824640-021822-1b407daa90b33541af8a578bfb31b3ee-264568386');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Producto Test';
$item->quantity = 1;
$item->unit_price = $PrecioTotal;
$preference->items = array($item);
$preference->save();
?>



<html>
  <head>
    <title>Payment HAZE</title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <!--<script type="text/javascript" src="js/index.js" defer></script>-->
    <script  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>"></script>

  </head>
  <body>
    <main>
      <!-- Shopping Cart -->
      <section class="shopping-cart dark">
        <div class="container" id="container">
          <div class="block-heading">
            <h2>Carrito de Compras</h2>
            <p>Tu compra ya casi esta lista!</p> 
          </div>
          <div class="content">
            <div class="row">
              <div class="col-md-12 col-lg-8">
                <div class="items">
                  <div class="product">
                    <div class="info">
                      <div class="product-details">
                        <div class="row justify-content-md-center">
                          <div class="col-md-3">
                            <img class="img-fluid mx-auto d-block image" src="img/bokita.jpg">
                          </div>
                          <div class="col-md-4 product-detail">
                            <h5>Producto</h5>
                            <div class="product-info">
                              <p><b>Descripcion: </b><span id="product-description">Remera de Bokita el mas grande</span><br>
                              <b>Marca: </b>Adidas<br>
                              <b>Price:</b> $ <span id="unit-price">10</span></p>
                            </div>
                          </div>
                          <div class="col-md-3 product-detail">
                            <label for="quantity"><h5>Cantidad</h5></label>
                            <input type="number" id="quantity" value="1" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="summary">
                  <h3>Resumen</h3>
                  <div class="summary-item"><span class="text">Subtotal</span><span class="price" id="cart-total"></span></div>
                 <script  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-button-label="Comprar" data-preference-id="<?php echo $preference->id; ?>">Checkout</script>          
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--payment-->
      <section class="payment-form dark">
        <div class="container_payment">
          <div class="block-heading">
            <h2>Checkout Payment</h2>
            <p>This is an example of a Mercado Pago integration</p>
          </div>
          <div class="form-payment">
            <div class="products">
              <h2 class="title">Summary</h3>
              <div class="item">
                <span class="price" id="summary-price"></span>
                <p class="item-name">Book x <span id="summary-quantity"></span></p>
              </div>
              <div class="total">Total<span class="price" id="summary-total"></span></div>
            </div>
            <div class="payment-details">
              <div class="form-group col-sm-12">
                <br>      
                <div id="button-checkout">
                </div>                 
                <br>
                <a id="go-back">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 10 10" class="chevron-left">
                    <path fill="#009EE3" fill-rule="nonzero"id="chevron_left" d="M7.05 1.4L6.2.552 1.756 4.997l4.449 4.448.849-.848-3.6-3.6z"></path>
                  </svg>
                  Go back to Shopping Cart
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- footer -->
    </main>
    <footer>
		</footer>
  </body>
</html>




