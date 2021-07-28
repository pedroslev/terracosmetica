<!--Efectivizada-->
<?php
include './server/database.php';
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
		
		$sql = "INSERT INTO TERRA_Clientes (Nombre, Apellido, TipoDoc, Doc, Email, Calle, Altura, Postal, Departamento, Provincia, Localidad, Observaciones, Telefono) VALUES ('$Nombre', '$Apellido', '$TipoDoc', '$Documento', '$Email', '$DirCalle', '$DirNumero', '$DirPostal', '$DirDepartamento', '$Provincia', '$Localidad', '$Observaciones', '$Telefono')";
		$result = $conn->query($sql);
		$IDCliente = $conn->insert_id;//Guarda el ID cliente	
		
	// Fin de carga de Cliente

	//Carga de Productos	
		$PrecioTotal = 0;
		$CodigoPedido="A1455"; //Falta randomizar

//FALTAA While para repetir dependiendo la cxant de productos
		$IDProd= $_POST['IDProd'];
		$PrecioFinal = $_POST['Precio'];
		$PrecioTotal = $PrecioTotal + $PrecioFinal;

		$sqlP = "INSERT INTO TERRA_Pedidos (CodigoPedido, IDProducto, PrecioFinal) VALUES ('$CodigoPedido', '$IDProd', '$PrecioFinal')";
		$resultP = $conn->query($sqlP);

	//Fin Carga de Productos

	//Carga de Venta
		$Fecha= date("Ymd");

		$sqlV = "INSERT INTO TERRA_Ventas (IDCliente, CodigoPedido, PrecioTotal, Fecha, Estado) VALUES ('$IDCliente', '$CodigoPedido', '$PrecioTotal', '$Fecha', '1')";
		$resultV = $conn->query($sqlV);

	//Fin Carga de Productos


}
?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">



	<script type="text/javascript">
		document.documentElement.className = 'js';
	</script>

    <!-- Bootstrap core CSS -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

	<meta content="Divi v.4.4.8" name="generator">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
	<link rel="alternate" type="application/rss+xml" title="Terra Cosmética Natural &raquo; Feed" href="index.html" />
	<link rel='stylesheet' href='css/Divi-style.css'>
	<!--no borrar-->

	<!--no borrar-->
	<script type='text/javascript' src='js/jquery.js' async></script>
	<link rel="stylesheet" href="css/global-et-divi-customizer-global-1614728849082.min.css">
	<link rel='stylesheet' href='css/home.css'>
	
</head>

<body
	class=" et_header_style_centered et_pb_footer_columns4 et_cover_background et_pb_gutter et_pb_gutters3 et_pb_pagebuilder_layout et_no_sidebar et_divi_theme et-db et_minified_js et_minified_css">
	<div id="page-container">
	
	<header id="main-header" data-height-onload="150">
   
</header> <!-- #main-header -->
		
			<div class="container">
				<main>
					<div class="mt-5">
					</div>
				<form class="needs-validation" action="" method="post">		
					<div class="row g-5">
						<div class="col-md-5 col-lg-4 order-md-last">
							<h4 class="d-flex justify-content-between align-items-center mb-3">
								<span class="">Tus Productos</span>
								<span class="badge rounded-pill">Total: $<span class="total-cart"></span></span>
							</h4>
							<div class="modal-body">
								<table class="show-cart table">
		
								</table>
			<!-- hay que hacer que se actualicen con el modal para que los levante el php -->
								<input type="hidden" id="IDProd" name="IDProd" value="1" required>
								<input type="hidden" id="Precio" name="Precio" value="50" required>
							</div>
							
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Promo code">
									<button type="submit" class="btn btn-secondary">Redeem</button>
								</div>
							
						</div>
						<div class="col-md-7 col-lg-8">
							<h4 class="mb-3">Datos de Envio</h4>
							
								<div class="row g-3">
									<div class="col-sm-6">
										<label for="firstName" class="form-label">Nombre</label>
										<input type="text" class="form-control" id="firstName" name="Nombre" placeholder="Juan" value="" required>
										<div class="invalid-feedback">
											Ingrese un nombre valido.
										</div>
									</div>
		
									<div class="col-sm-6">
										<label for="lastName" class="form-label">Apellido</label>
										<input type="text" class="form-control" id="lastName" name="Apellido" placeholder="Perez Linch" value="" required>
										<div class="invalid-feedback">
											Ingrese un apellido valido.
										</div>
									</div>
		
									<div class="col-md-6 mt-3">
										<label for="state" class="form-label">Tipo de Documento</label>
										<select class="form-control" id="state" name="TipoDocumento" required>
											<option value="">Elegir...</option>
											<option value="1">DNI</option>
											<option value="2">Pasaporte</option>
										</select>
										<div class="invalid-feedback">
											Ingrese una dni valido.
										</div>
									</div>
		
									<div class="col-sm-6 mt-3">
										<label for="lastName" class="form-label">Documento</label>
										<input type="text" class="form-control" id="lastName" name="Documento" placeholder="48646353" value="" required>
										<div class="invalid-feedback">
											Ingrese un Documento valido.
										</div>
									</div>
								</div>
								<hr class="my-4">
								<div class="row g-3">
									<div class="col-6">
										<label for="email" class="form-label">Email <span class="text-muted"></span></label>
										<input type="email" class="form-control" id="email" name="Email" placeholder="nombre@ejemplo.com" required>
										<div class="invalid-feedback">
											Ingrese un Email valido.
										</div>
									</div>
									<div class="col-6">
										<label for="lastName" class="form-label">Telefono</label>
										<input type="text" class="form-control" id="lastName" name="Telefono" placeholder="01145453498" value="" required>
										<div class="invalid-feedback">
											Ingrese un Telefono valido.
										</div>
									</div>
								</div>
								<hr class="my-4">
								<div class="row g-3">
		
									<div class="col-6">
										<label for="address" class="form-label">Calle</label>
										<input type="text" class="form-control" id="address" name="DirCalle" placeholder="Calle" required>
										<div class="invalid-feedback">
											Ingrese su Calle.
										</div>
									</div>
		
									<div class="col-6">
										<label for="address" class="form-label">Numero</label>
										<input type="text" class="form-control" id="address" name="DirNumero" placeholder="1234" required>
										<div class="invalid-feedback">
											Ingrese su Numero.
										</div>
									</div>
									
									
									<div class="col-md-6 mt-3">
										<label for="zip" class="form-label">Codigo Postal</label>
										<input type="text" class="form-control" id="zip" name="DirPostal" placeholder="1234" required>
										<div class="invalid-feedback">
											Ingrese un codigo zip valido.
										</div>
									</div>
		
									<div class="col-md-6 mt-3">
										<label for="zip" class="form-label">Deparamento</label>
										<input type="text" class="form-control" id="dep" name="DirDepartamento" placeholder="11 D - NO [En caso de no serlo]" required>
										<div class="invalid-feedback">
											Ingrese un departamento valido.
										</div>
									</div>
								</div>
		
								<hr class="my-4">
								<div class="row gt-3">
		
		
									<div class="col-md-6">
										<label for="state" class="form-label">Provincia</label>
										<select class="form-control" name="Provincia" id="dynamic_slct_prov" required></select>
										<div class="invalid-feedback">
											Ingrese una provinicia valida.
										</div>
									</div>
		
									<div class="col-md-6">
										<label for="state" class="form-label">Localidad</label>
										<select class="form-control" id="dynamic_slct" name="Localidad" required></select>
										<div class="invalid-feedback">
											Ingrese una provinicia valida.
										</div>
									</div>
								</div>
								<hr class="my-4">
								<div class="row g-3">
		
									<div class="form-floating col-12">
										
										<textarea class="form-control" placeholder="Observaciones" id="floatingTextarea2" name="Observaciones" style="height: 100px"></textarea>
									  </div>
		
									</div>
									<!-- NO FUNCA NECESITA COOKIES
								<div class="form-check mt-3">
									<input type="checkbox" class="form-check-input" id="save-info" name="?">
									<label class="form-check-label" for="save-info">Guardar información para la próxima compra.[NO FUNCIONA]</label>
								</div>-->
		
								<hr class="my-4">
		
		
								<button type="submit" class="w-100 btn btn-primary" name="CargaDB">Pagar con Mercado Pago</button>
							
						</div>
					</div>	
				</form>
				</main>
		</div>

		
			<!-- FOOTER -->
			<footer class="container mt-5">
			<p class="float-right"> Powered & Designed by<a style="color: green;" href="https://hazear.com/"> HAZEinc.</a></p>
			<p class="float-left"><a href="http://hazear.com/" target="_blank" style="color: grey;">&copy; S.O.V. 2020 - <?php echo date("Y"); ?>. Versión <?php echo $VERSION; ?></a></p>
				
			</footer>
            
                <!-- Bootstrap core JavaScript
            ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
            
                <script src="js/form-validation.js"></script>
            
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
                </script>
                <script>
                    window.jQuery || document.write('<script src="js/jquery-slim.min.js"><\/script>')
                </script>
                <script src="js/popper.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
                <script src="js/holder.min.js"></script>
                <script src="js/script.js"></script>
                <!-- Icons -->
                <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
                <script>
                    feather.replace()
                </script>
            
            

	</div> <!-- #page-container -->

	<script type="text/javascript" src="js/scriptcheckout.js"></script>

	<script type="text/javascript">
		var et_animation_data = [{
			"class": "et_pb_fullwidth_slider_0",
			"style": "fade",
			"repeat": "once",
			"duration": "700ms",
			"delay": "100ms",
			"intensity": "50%",
			"starting_opacity": "0%",
			"speed_curve": "ease-in-out"
		}, {
			"class": "et_pb_fullwidth_slider_1",
			"style": "fade",
			"repeat": "once",
			"duration": "700ms",
			"delay": "100ms",
			"intensity": "50%",
			"starting_opacity": "0%",
			"speed_curve": "ease-in-out"
		}];

	</script>
	<!-- 	<script type='text/javascript' src='js/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='js/js.cookie.min.js'></script>
<script type='text/javascript' src='js/woocommerce.min.js'></script>
<script type='text/javascript' src='js/country-select.min.js'></script>
<script type='text/javascript' src='js/address-i18n.min.js'></script>
<script type='text/javascript' src='js/checkout.min.js'></script>
<script type='text/javascript' src='js/fee.js'></script>
<script type='text/javascript' src='js/add-to-cart.min.js'></script>
<script type='text/javascript' src='js/cart-fragments.min.js'></script> BORRAR -->
	<script type='text/javascript'>
		/* <![CDATA[ */
		var DIVI = {
			"item_count": "%d Item",
			"items_count": "%d Items"
		};
		var et_shortcodes_strings = {
			"previous": "Anterior",
			"next": "Siguiente"
		};
		var et_pb_custom = {
			"ajaxurl": "http:\/\/dev.terracosmeticanatural.com\/wp-admin\/admin-ajax.php",
			"et_frontend_nonce": "d11a2c5d5c",
			"subscription_failed": "Por favor, revise los campos a continuaci\u00f3n para asegurarse de que la informaci\u00f3n introducida es correcta.",
			"et_ab_log_nonce": "8517988a9c",
			"fill_message": "Por favor, rellene los siguientes campos:",
			"contact_error_message": "Por favor, arregle los siguientes errores:",
			"invalid": "De correo electr\u00f3nico no v\u00e1lida",
			"captcha": "Captcha",
			"prev": "Anterior",
			"previous": "Anterior",
			"next": "Siguiente",
			"wrong_captcha": "Ha introducido un n\u00famero equivocado de captcha.",
			"wrong_checkbox": "Checkbox",
			"ignore_waypoints": "no",
			"is_divi_theme_used": "1",
			"widget_search_selector": ".widget_search",
			"ab_tests": [],
			"is_ab_testing_active": "",
			"page_id": "14",
			"unique_test_id": "",
			"ab_bounce_rate": "5",
			"is_cache_plugin_active": "yes",
			"is_shortcode_tracking": "",
			"tinymce_uri": ""
		};
		var et_frontend_scripts = {
			"builderCssContainerPrefix": "#et-boc",
			"builderCssLayoutPrefix": "#et-boc .et-l"
		};
		var et_pb_box_shadow_elements = [];
		var et_pb_motion_elements = {
			"desktop": [],
			"tablet": [],
			"phone": []
		};
		/* ]]> */
	</script>
	<script type='text/javascript' src='js/custom.unified.js' async></script>
	<script type='text/javascript' src='js/common.js' async></script>
	<script type='text/javascript' src='js/wp-embed.min.js' async></script>
	<script src="js/localidades.js"></script>
	<script src="js/provincias.js"></script>
</body>

</html>