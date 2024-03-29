<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Libroonline.org - Lee, imagina y aprende</title>
	<link rel="icon" href="assets/img/libro-abierto.png" type="image/png">
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="assets/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="assets/vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="assets/css/pagina.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="pagina.php"><img src="assets/img/loopa.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item"><a class="nav-link" href="pagina.php">Home</a></li>
              <li class="nav-item active submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Categoria</a>
                <ul class="dropdown-menu">
                  <?php
              //incluimos el fichero de conexion
              include_once('view/config/dbconect.php');

              $database = new Connection();
              $db = $database->open();
              try{  
                $sql = 'SELECT * FROM category';
                foreach ($db->query($sql) as $row) {
                  ?>
                   <li class="nav-item"><a class="nav-link" href="category.php?id=<?php echo $row['id_cate']; ?>"><?php echo $row['nomcate']; ?></a></li>
                    
                  <?php 
                }
              }
              catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
              }

              //Cerrar la Conexion
              $database->close();

              ?>
                 
                </ul>
							</li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Autor</a>
                <ul class="dropdown-menu">

                  <?php
              //incluimos el fichero de conexion
              include_once('view/config/dbconect.php');

              $database = new Connection();
              $db = $database->open();
              try{  
                $sql = 'SELECT * FROM author';
                foreach ($db->query($sql) as $row) {
                  ?>
                   <li class="nav-item"><a class="nav-link" href="autor.php?id=<?php echo $row['id_au']; ?>"><?php echo $row['nomau']; ?><?php echo $row['apeau']; ?></a></li>
                    
                  <?php 
                }
              }
              catch(PDOException $e){
                echo "Hubo un problema en la conexión: " . $e->getMessage();
              }

              //Cerrar la Conexion
              $database->close();

              ?>
                  
                  
                </ul>
							</li>
							
               <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
             
              <li class="nav-item"><a class="button button-header" href="#">+1000 LIBROS GRATIS</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
	<!--================ End Header Menu Area =================-->
  <section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1>Categorias</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="pagina.php">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

    <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">               
            <div>

              <div class="input-group filter-bar-search">
                <input type="text" id="FiltrarContenido" placeholder="Search">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>

            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">

               <?php
      //incluimos el fichero de conexion
      include_once('view/config/dbconect.php');
      $id = $_GET['id'];
      $database = new Connection();
      $db = $database->open();
      try{  
        $sql = "SELECT libro.id_libro, libro.nomli, libro.foto,libro.link,author.id_au, category.id_cate,category.nomcate,author.nomau, author.apeau, author.alias, author.biblio,  author.fecna, author.email, edito.id_edi, edito.nomedi,libro.lugar, libro.anedi, libro.numpa, libro.idioma, libro.sinop, libro.estado FROM libro INNER JOIN category ON libro.id_cate=category.id_cate INNER JOIN author ON libro.id_au=author.id_au INNER JOIN edito ON libro.id_edi=edito.id_edi where category.id_cate ='$id'";
        foreach ($db->query($sql) as $row) {
          ?>
          <div class="col-md-6 col-lg-4 BusquedaRapida">
                <div class="card text-center card-product">
                  <div class="card-product__img">
                    <img class="card-img" src="assets/img/imagenes/<?php echo $row['foto']; ?>" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                    
                      <li><button><i class="ti-download"></i></button></li>
                    </ul>
                  </div>
                  <div class="card-body">
                    <p><?php echo $row['nomcate']; ?></p>
                    <h4 class="card-product__title"><a href="category_detail.php?id=<?php echo $row['id_libro']; ?>"><?php echo $row['nomli']; ?></a></h4>
                   
                  </div>
                </div>
              </div>
          <?php 
        }
      }
      catch(PDOException $e){
        echo "Hubo un problema en la conexión: " . $e->getMessage();
      }

      //Cerrar la Conexion
      $database->close();

    ?>


            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>

  <!--================ Start footer Area  =================-->	
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
					<div class="col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Our Mission</h4>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							</p>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Quick Links</h4>
							<ul class="list">
								<li><a href="#">Home</a></li>
								<li><a href="#">Categoria</a></li>
								<li><a href="#">Autor</a></li>
								
								<li><a href="#">Contact</a></li>
                <li><a href="#">Login</a></li>
							</ul>
						</div>
					</div>

					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Contact Us</h4>
							<div class="ml-40">
								<p class="sm-head">
									<span class="fa fa-location-arrow"></span>
									Head Office
								</p>
								<p>123, Main Street, Your City</p>
	
								<p class="sm-head">
									<span class="fa fa-phone"></span>
									Phone Number
								</p>
								<p>
									+123 456 7890 <br>
									+123 456 7890
								</p>
	
								<p class="sm-head">
									<span class="fa fa-envelope"></span>
									Email
								</p>
								<p>
									free@infoexample.com <br>
									www.infoexample.com
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</footer>
	<!--================ End footer Area  =================-->



  <script src="assets/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="assets/vendors/skrollr.min.js"></script>
  <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="assets/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="assets/vendors/jquery.ajaxchimp.min.js"></script>
  <script src="assets/vendors/mail-script.js"></script>
  <script src="assets/js/main.js"></script>
    <script type="text/javascript">
$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida div').hide();
           
             $('.BusquedaRapida div').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
          

                })
      }(jQuery));
});
</script> 
</body>
</html>