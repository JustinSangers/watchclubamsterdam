
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Watch Club Amsterdam</title>
	<meta name="description" content="A place where you can easily search through all vintage watches that are for sale in Amsterdam." />
	<meta name="keywords" content="blueprint, template, layout, grid, responsive, products, store, filter, isotope, flickity" />
	<meta name="author" content="Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Pixel Fabric clothes icons -->
	<link rel="stylesheet" type="text/css" href="fonts/pixelfabric-clothes/style.css" />
	<!-- General demo styles & header -->
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	 <!-- Flickity gallery styles -->
	<link rel="stylesheet" type="text/css" href="css/flickity.css" />
	<!-- WatchClub custom style-->
	<link rel="stylesheet" type="text/css" href="css/watchclub.css" />
	<!-- Component styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	
	<script src='js/console_runner.js'></script>
	<script src='js/live_reload.js'></script>

	<script src="js/modernizr.custom.js"></script>
<style>


.overlay {
    height: 0%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
    overflow-y: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}
</style>

</head>
<body>

<!-- FB SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/nl_NL/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- end FB SDK -->


<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>
</div>

<script>
function openNav() {
    document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.height = "0%";
}
</script>



	<!-- Bottom bar with filter and cart info -->
	<div class="bar">
		<div class="filter">
			<span class="filter__label">Filter: </span>
			<button class="action filter__item filter__item--selected" data-filter="*">All</button>
			<button class="action filter__item" data-filter=".Omega"><i class="icon icon--jacket"></i><span class="action__text">Omega</span></button>
			<button class="action filter__item" data-filter=".Rolex"><i class="icon icon--shirt"></i><span class="action__text">Rolex</span></button>
			<button class="action filter__item" data-filter=".IWC"><i class="icon icon--dress"></i><span class="action__text">IWC</span></button>
			<button class="action filter__item" data-filter=".Breitling"><i class="icon icon--IWC"></i><span class="action__text">Breitling</span></button>
			<button class="action filter__item" data-filter=".Cartier"><i class="icon icon--shoe"></i><span class="action__text">Cartier</span></button>
			<button class="action filter__item" data-filter=".Jaeger"><i class="icon icon--shoe"></i><span class="action__text">Jaeger</span></button>

		</div>
		<button class="cart" style="display:none;">
			<i class="cart__icon fa fa-shopping-cart"></i>
			<span class="text-hidden">Shopping cart</span>
			<span class="cart__count">0</span>
		</button>
	</div>
	<!-- Main view -->
	<div class="view">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			
			<h1><img src="images/watchclub-logo.png" width="350"> 
			<div class="fb-follow" style="display:block;" data-href="https://www.facebook.com/watchclubamsterdam" data-layout="button" data-size="large" data-show-faces="true"></div></h1>
		
		</header>

		<!-- Search -->
		<input type="text" class="quicksearch" placeholder="Search" />


		<!-- Grid -->
		<section class="grid grid--loading">
			<!-- Loader -->
			<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
			<!-- Grid sizer for a fluid Isotope (Masonry) layout -->
			<div class="grid__sizer"></div>
			<!-- Grid items -->
			

	<!-- AWCO watches -->
			<?php
			// copy file content into a string var
			$json_file = file_get_contents('json_awco');
			// convert the string to a json object
			$jfo = json_decode($json_file);
			?>

			<?php foreach($jfo->scrape as $pages): ?>

			<?php 
				$data = $pages->result->extractorData->data[0]->group;
			 ?>

			<?php foreach($data as $watch): ?>

			<?php 
				$product_title = $watch->{'Productname link'}[0]->text;
				$product_img = $watch->{'Product image'}[0]->src;
				$product_price = $watch->{'Amount price'}[0]->text;
				$product_link = $watch->{'Producttype link'}[0]->href;


			 ?>

			 			<a href="<?php echo $product_link; ?>" target="_blank">
						<div class="grid__item element-item <?php echo $product_title; ?>">
							<div class="slider">
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
							</div>
							<div class="meta">
								<h3 class="meta__title"><?php echo $product_title; ?></h3>
								<span class="meta__brand"><?php echo $product_price; ?></span>
								<!--<span class="meta__price"><?php echo $product_price; ?></span>-->
							</div>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="text-hidden">Add to cart</span></button>
						</div>
						</a>

			<?php endforeach; ?>
			<?php endforeach; ?>

<!-- end AWCO watches -->

<!-- AVW watches -->
			<?php
			// copy file content into a string var
			$json_file = file_get_contents('json_avw');
			// convert the string to a json object
			$jfo = json_decode($json_file);
			?>

			<?php foreach($jfo->scrape as $pages): ?>

			<?php 
				$data = $pages->result->extractorData->data[0]->group;
			 ?>

			<?php foreach($data as $watch): ?>

			<?php 
				$product_title = $watch->{'Productname link'}[0]->text;
				$product_img = $watch->{'Productimg image'}[0]->src;
				$product_price = $watch->{'Product price'}[0]->text;
				$product_link = $watch->{'Productname link'}[0]->href;


			 ?>

			 			<a href="<?php echo $product_link; ?>" target="_blank">
						<div class="grid__item element-item <?php echo $product_title; ?>">
							<div class="slider">
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
							</div>
							<div class="meta">
								<h3 class="meta__title"><?php echo $product_title; ?></h3>
								<span class="meta__brand"><?php echo $product_price; ?></span>
								<!--<span class="meta__price"><?php echo $product_price; ?></span>-->
							</div>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="text-hidden">Add to cart</span></button>
						</div>
						</a>

			<?php endforeach; ?>
			<?php endforeach; ?>

<!-- end AVW watches -->


<!-- SPIEGEL watches -->
			<?php
			// copy file content into a string var
			$json_file = file_get_contents('json_spiegel');
			// convert the string to a json object
			$jfo = json_decode($json_file);
			?>

			<?php foreach($jfo->scrape as $pages): ?>

			<?php 
				$data = $pages->result->extractorData->data[0]->group;
			 ?>

			<?php foreach($data as $watch): ?>

			<?php 
				$product_title = $watch->{'Productlefttitle value'}[0]->text;
				$product_img = $watch->{'Productright image'}[0]->src;
				$product_price = $watch->{'Information price'}[0]->text;
				$product_link = $watch->{'Meer link'}[0]->href;


			 ?>

			 			<a href="<?php echo $product_link; ?>" target="_blank">
						<div class="grid__item element-item <?php echo $product_title; ?>">
							<div class="slider">
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
								<div class="slider__item"><img src="<?php echo $product_img; ?>" alt="Dummy" /></div>
							</div>
							<div class="meta">
								<h3 class="meta__title"><?php echo $product_title; ?></h3>
								<span class="meta__brand"><?php echo $product_price; ?></span>
								<!--<span class="meta__price"><?php echo $product_price; ?></span>-->
							</div>
							<button class="action action--button action--buy"><i class="fa fa-shopping-cart"></i><span class="text-hidden">Add to cart</span></button>
						</div>
						</a>

			<?php endforeach; ?>
			<?php endforeach; ?>

<!-- end SPIEGEL watches -->



		</section>
		<!-- /grid-->
	</div>
	<!-- /view -->
	<script src="js/flickity.pkgd.min.js"></script>
	<script src="js/main.js"></script>

	<script src='js/timeout.js'></script>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src="js/isotope.pkgd.min.js"></script>



	<script>var qsRegex;
	var $grid = $('.grid').isotope({
	    itemSelector: '.element-item',
	    layoutMode: 'fitRows',
	    filter: function () {
	        return qsRegex ? $(this).text().match(qsRegex) : true;
	    }
	});
	var $quicksearch = $('.quicksearch').keyup(debounce(function () {
	    qsRegex = new RegExp($quicksearch.val(), 'gi');
	    $grid.isotope();
	}, 200));
	function debounce(fn, threshold) {
	    var timeout;
	    return function debounced() {
	        if (timeout) {
	            clearTimeout(timeout);
	        }
	        function delayed() {
	            fn();
	            timeout = null;
	        }
	        timeout = setTimeout(delayed, threshold || 100);
	    };
	}
	//# sourceURL=pen.js
	</script>



</body>
</html>