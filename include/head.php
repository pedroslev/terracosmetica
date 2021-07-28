<div class="row fixed-bottom mb-3 ml-1">
    <div class="col">
        <div class="float-left">
            <div class="float-left">
                <button type="button" class="btn btn-cart et-cart-info" data-toggle="modal" data-target="#cart"><span class="total-count m-2"></span></button>
            </div>

            <div class="d-none">
                <button class="clear-cart btn btn-danger">Clear Cart</button></div>
        </div>
    </div>
</div>

<header id="main-header" data-height-onload="150">
    <div class="container clearfix et_menu_container">
        <div class="logo_container">
            <span class="logo_helper"></span>
            <a href="index.php">
                <img src="images/logo-fondo-transparente.jpg" alt="Terra Cosmética Natural" id="logo"
                    data-height-percentage="90" />
            </a>
        </div>
        <div id="et-top-navigation" data-height="150" data-fixed-height="40">
            <nav id="top-menu-nav">
                <ul id="top-menu" class="nav">
                    <li id="menu-item-117"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-14 current_page_item menu-item-117">
                        <a href="index.php" aria-current="page">INICIO</a>
                    </li>
                    <li id="menu-item-280"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-280"><a
                            href="quienes-somos.php">QUIÉNES SOMOS</a></li>
                    <li id="menu-item-972"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-972">
                        <a href="nuestros-productos.php">NUESTROS PRODUCTOS</a>
                        <ul class="sub-menu">
                        <?php 
                            include './server/database.php';

                            //MOSTRADOR DE CATEGORIAS
                            $sql1 ="SELECT * FROM ".$DBN."_Categorias";
                            $result1= $conn->query($sql1);
                            if ($result1->num_rows > 0) {
                                // output data of each row
                                while($row1 = $result1->fetch_assoc()) {
                        ?>
                        

                    <li id="menu-item-1320"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1320">
                                <a href="nuestros-productos.php?Categoria=<?php echo $row1["ID"]; ?>"><?php echo $row1["Nombre"]; ?></a>
                            </li>

                        <?php 
                                }
                            } else {
                                echo "No Hay Categorias";
                            }
                        ?>
                        
                        
                        
                        </ul>
                    </li>
                    <li id="menu-item-294"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-294"><a
                            href="preguntas-frecuentes.php">PREGUNTAS FRECUENTES</a></li>
                    <li id="menu-item-400"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-400"><a
                            href="pagina-mayorista.php">ACCESO MAYORISTA</a></li>
                    <li id="menu-item-351"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-351"><a
                            href="contacto.php">CONTACTO</a></li>
                </ul>
            </nav>


            <div id="et_mobile_nav_menu">
                <div class="mobile_nav closed">
                    <span class="select_page">Seleccionar página</span>
                    <span class="mobile_menu_bar mobile_menu_bar_toggle"></span>
                </div>
            </div>
        </div> <!-- #et-top-navigation -->
    </div> <!-- .container -->
    <div class="et_search_outer">
        <div class="container et_search_form_container">
            <form role="search" method="get" class="et-search-form" action="index.php">
                <input type="search" class="et-search-field" placeholder="Búsqueda &hellip;" value="" name="s"
                    title="Buscar:" />
            </form>
            <span class="et_close_search_field"></span>
        </div>
    </div>
</header> <!-- #main-header -->