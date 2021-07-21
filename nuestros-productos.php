<?php 


include './server/database.php';

if (empty($_GET['Categoria']))
{
	$sql ="SELECT * FROM ".$DBN."_Productos WHERE Mostrar='1' AND Eliminar!='1' ";
	$texto="Nuestro Productos";
}
else{
	if ($_GET['Categoria']=="Ofertas")
	{
		$sql ="SELECT * FROM ".$DBN."_Productos WHERE Mostrar='1' AND Eliminar!='1' AND Oferta!='0' ";
		$texto="Ofertas";
	}
	else{
		$Categoria= $_GET['Categoria'];

		$sqlC ="SELECT * FROM ".$DBN."_Categorias WHERE ID=".$Categoria." ";
		$resultC= $conn->query($sqlC);
		if ($resultC->num_rows > 0) {
			$fila = mysqli_fetch_object($resultC);
          	$texto = $fila->Nombre;

			$sql ="SELECT * FROM ".$DBN."_Productos WHERE Mostrar='1' AND Eliminar!='1' AND ( Categoria=".$Categoria." OR Categoria2=".$Categoria." OR Categoria3=".$Categoria.") ";
			
		}
		else{
			
			$sql ="SELECT * FROM ".$DBN."_Productos WHERE Mostrar='1' AND Eliminar!='1' ";
			$texto="Nuestros Productos";
		};
		
	};
};


?>
<html lang="es"><head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">


	<link rel="dns-prefetch" href="//fonts.googleapis.com">
	<link rel="dns-prefetch" href="//s.w.org">
	
	<meta content="Divi v.4.4.8" name="generator">
	<!--
	
	<link rel="stylesheet" href="css/woocommerce-packages-woocommerce-blocks-build-style.css">
	<link rel="stylesheet" href="css/woocommerce-assets-css-woocommerce-layout.css">
	<link rel="stylesheet" href="css/woocommerce-assets-css-woocommerce-smallscreen.css">
	<link rel="stylesheet" href="css/woocommerce-assets-css-woocommerce.css">
	<link rel="stylesheet" href="css/dist-block-library-style.min.css">
-->

 <!-- Bootstrap core CSS -->
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
	<link rel='stylesheet' href='css/creame-whatsapp-me-public-css-joinchat.min.css'>
	<script type='text/javascript' src='js/jquery.js' async></script>
	<link rel="stylesheet" href="css/global-et-divi-customizer-global-1614728849082.min.css">
	
	<!-- 
	<link rel="stylesheet" href="css/minimum-purchase-for-woocommerce-core-css-vtmin-error-style.css">
	<link rel="stylesheet" href="css/woocommerce-assets-css-photoswipe-photoswipe.min.css">
	<link rel="stylesheet" href="css/woocommerce-assets-css-photoswipe-default-skin-default-skin.min.css">
	<link rel="stylesheet" href="css/dashicons.min.css"> -->
	<!--
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-migrate.min.js"></script>
	<script type="text/javascript" src="js/es6-promise.auto.min.js"></script>
	<script type="text/javascript" src="js/recaptcha.js"></script>
	<script type="text/javascript" src="js/vtmin-clear-cart-msgs.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link rel="shortcut icon" href=""> <noscript>
		<style>
			.woocommerce-product-gallery {
				opacity: 1 !important;
			}
		</style>
	</noscript>
	<style type="text/css" id="custom-background-css">
		body.custom-background {
			background-color: #ffffff;
		}
	</style> -->
	<!--  -->
	<link rel="stylesheet" href="css/nuestros-productos.css">
<style>[data-columns]::before{visibility:hidden;position:absolute;font-size:1px;}</style><style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style></head>

<body class="page-template-default page page-id-966 custom-background theme-Divi woocommerce-js et_pb_button_helper_class et_fullwidth_nav et_fixed_nav et_show_nav et_primary_nav_dropdown_animation_fade et_secondary_nav_dropdown_animation_fade et_header_style_centered et_pb_footer_columns4 et_cover_background et_pb_gutter et_pb_gutters3 et_pb_pagebuilder_layout et_full_width_page et_divi_theme et-db et_minified_js et_minified_css chrome">
	<div id="page-container" class="et-animated-content" style="margin-top: -32px;">

	<?php include './include/head.php'; ?>

		<div id="et-main-area">

			<div id="main-content">



				<article id="post-966" class="post-966 page type-page status-publish hentry">


					<div class="entry-content">
						<div id="et-boc" class="et-boc woocommerce woocommerce-page">

							<div class="et-l et-l--post">
								<div class="et_builder_inner_content et_pb_gutters3 product">
									<div class="et_pb_section et_pb_section_0 et_section_regular">




										<div class="et_pb_row et_pb_row_0">
											<div class="et_pb_column et_pb_column_4_4 et_pb_column_0  et_pb_css_mix_blend_mode_passthrough et-last-child">


												<div class="et_pb_module et_pb_text et_pb_text_0  et_pb_text_align_center et_pb_bg_layout_light">


													<div class="et_pb_text_inner">
														<h1><?php echo $texto; ?></h1>
													</div>
												</div> <!-- .et_pb_text -->
												<div class="et_pb_module et_pb_text et_pb_text_1  et_pb_text_align_center et_pb_bg_layout_light">


													<div class="et_pb_text_inner">
														<h2>Conseguí todo lo que necesitas para tu cuidado personal</h2>
													</div>
												</div> <!-- .et_pb_text -->
											</div> <!-- .et_pb_column -->


										</div> <!-- .et_pb_row -->
										<div class="et_pb_row et_pb_row_1 et_pb_equal_columns">
											<div class="et_pb_column et_pb_column_4_4 et_pb_column_1  et_pb_css_mix_blend_mode_passthrough et-last-child">


												<div class="et_pb_module et_pb_text et_pb_text_2  et_pb_text_align_center et_pb_bg_layout_light">


													<div class="et_pb_text_inner">
														<h1><?php echo $texto; ?></h1>
													</div>
												</div> <!-- .et_pb_text -->
												<div class="et_pb_module et_pb_text et_pb_text_3  et_pb_text_align_center et_pb_bg_layout_light">


													<div class="et_pb_text_inner">
														<h2>Conseguí todo lo que necesitas para tu cuidado personal</h2>
													</div>
												</div> <!-- .et_pb_text -->
											</div> <!-- .et_pb_column -->


										</div> <!-- .et_pb_row -->


									</div> <!-- .et_pb_section -->
									<div class="et_pb_section et_section_regular">




										

										<?php 
										//MOSTRADOR DE PRODUCTOS EN OFERTA

										
										$result= $conn->query($sql);
										if ($result->num_rows > 0) {										
										while($row = $result->fetch_assoc()) { 										
										?>

									<div class="" style="display:flex;">
										<div class="et_pb_column et_pb_column_1_2 et_pb_column_5 et_clickable  et_pb_css_mix_blend_mode_passthrough">
											<div class="et_pb_module et_pb_image et_pb_image_0">
												<a href="#"><span class="et_pb_image_wrap "><img src="<?php echo $PWD . $row["Imagen1"]; ?>" alt="" title="<?php echo $row["Nombre"]; ?>"></span></a>
												<?php if ($row["Stock"]<1){echo "Sin Stock";}else{if ($row["Stock"]<10){echo "Ultimas Disponibles";}else{echo "En Stock";}} ?>
												<?php if ($row["Oferta"]!=0){echo "%".$row["Oferta"];} ?>
											</div>
										</div>
										<div class="et_pb_column et_pb_column_1_2 et_pb_column_6  et_pb_css_mix_blend_mode_passthrough et-last-child">
											<div class="et_pb_module et_pb_wc_title et_pb_wc_title_0 et_clickable et_pb_bg_layout_light">
												<div class="et_pb_module_inner">
													<h1><?php echo $row["Nombre"]; ?></h1>
												</div>
											</div>
											<div class="et_pb_module">
												<div class="et_pb_module_inner">
													<p class=""><?php echo $row["Descripcion"]; ?></p>
												</div>
											</div>
											<div class="et_pb_module et_pb_wc_price et_pb_wc_price_0">
												<div class="et_pb_module_inner">
													<p class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span><?php echo $row["Precio"]; ?> <?php echo $row["Precio"]; ?></span></p>
												</div>
											</div>
											<div class="et_pb_with_border et_pb_module et_pb_wc_add_to_cart et_pb_wc_add_to_cart_0 et_pb_bg_layout_light et_pb_woo_custom_button_icon  et_pb_text_align_left" data-button-class="single_add_to_cart_button" data-button-icon="5" data-button-icon-tablet="" data-button-icon-phone="">
												<div class="et_pb_module_inner">
													<!-- HAY QUE REEVER ESTE FORM PARA HACERLO FUNCIONAR -->
													<form class="cart" action="#" method="post" enctype="multipart/form-data">
														<div class="quantity">
															<label class="screen-reader-text" for="quantity_60402626b783d"><?php echo $row["Nombre"]; ?></label>
															<input type="number" id="quantity_60402626b783d" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Cantidad" size="4" placeholder="" inputmode="numeric">
														</div>
														<button type="submit" value="225" style="color:black; border-color:lightgray; border-width: 1px;"class="single_add_to_cart_button button alt et_pb_promo_button et_pb_button et_pb_custom_button_icon">  <a href="#" data-name="<?php echo $row["ID"]; ?>" data-price="<?php echo $row["Precio"]; ?>" class="add-to-cart">Agregar al Carrito</a></button>
													</form>
												</div>
											</div>
										</div>
									</div>


										 <?php  }  } else { //deberia mostrarlo mas lindo ?>

											<h1>No Hay <?php echo $texto; ?></h1>

											<?php }  ?> 


									</div> <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
									 <!-- .et_pb_section -->
								</div><!-- .et_builder_inner_content -->
							</div><!-- .et-l -->


						</div><!-- #et-boc -->
					</div> <!-- .entry-content -->


				</article> <!-- .et_pb_post -->



			</div> <!-- #main-content -->

<?php include './include/foot.php'; ?>
			



	</div> <!-- #page-container -->
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
		var c = document.body.className;
		c = c.replace(/woocommerce-no-js/, 'woocommerce-js');
		document.body.className = c;
	</script>
	<!-- <script type="text/template" id="tmpl-variation-template">
		<div class="woocommerce-variation-description">{{{ data.variation.variation_description }}}</div>
	<div class="woocommerce-variation-price">{{{ data.variation.price_html }}}</div>
	<div class="woocommerce-variation-availability">{{{ data.variation.availability_html }}}</div>
</script>
	<script type="text/template" id="tmpl-unavailable-variation-template">
		<p>Lo sentimos, este producto no está disponible. Por favor elige otra combinación.</p>
</script>
	<script type="text/javascript" src="js/jquery.blockUI.min.js"></script>
	<script type="text/javascript" src="js/js.cookie.min.js"></script>
	<script type="text/javascript" src="js/woocommerce.min.js"></script>
	<script type="text/javascript" src="js/country-select.min.js"></script>
	<script type="text/javascript" src="js/address-i18n.min.js"></script>
	<script type="text/javascript" src="js/checkout.min.js"></script>
	<script type="text/javascript" src="js/fee.js"></script>
	<script type="text/javascript" src="js/add-to-cart.min.js"></script>
	<script type="text/javascript" src="js/cart-fragments.min.js"></script>
	<script type="text/javascript" src="js/custom.unified.js"></script>
	<script type="text/javascript" src="js/joinchat.min.js"></script>
	<script type="text/javascript" src="js/common.js"></script>
	<script type="text/javascript" src="js/jquery.zoom.min.js"></script>
	<script type="text/javascript" src="js/jquery.flexslider.min.js"></script>
	<script type="text/javascript" src="js/photoswipe.min.js"></script>
	<script type="text/javascript" src="js/photoswipe-ui-default.min.js"></script>
	<script type="text/javascript" src="js/single-product.min.js"></script>
	<script type="text/javascript" src="js/wp-embed.min.js"></script>
	<script type="text/javascript" src="js/underscore.min.js"></script>
	<script type="text/javascript" src="js/wp-util.min.js"></script>
	<script type="text/javascript" src="js/add-to-cart-variation.min.js"></script> -->
</body>
</html>