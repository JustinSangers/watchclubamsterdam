
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
	<script src="js/modernizr.custom.js"></script>



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
			

<!-- SPIEGELGRACHT watches -->
			<?php
			// copy file content into a string var
			$json_file = file_get_contents('https://extraction.import.io/query/extractor/33ed5280-ad5a-4cda-bc3c-9f3cfd6fdc9c?_apikey=51b3d087f64c4de5a73f6f27c1d714a6c66679dc30641a332e5dbb4fc5caaf935aaa4fcd88f1fbf729af7b1b0db026726f31412a8c7b8d57ac5ae75cac86167c214dcf7829668d2153e818fc499ba0d4&url=http%3A%2F%2Fwww.spiegelgrachtjuweliers.nl%2Fnl%2Fproduct%2Fhorloges');
			// convert the string to a json object
			$jfo = json_decode($json_file);
			// read the title value
			$title = $jfo->extractorData->url;
			// copy the posts array to a php var
			$data = $jfo->extractorData->data[0]->group;

			?>

			<?php foreach($data as $watch): ?>

			<?php 
				$product_title = $watch->{'Productlefttitle value'}[0]->text;
				$product_img = $watch->{'Productright image'}[0]->src;
				$product_price = $watch->{'Information price'}[0]->text;
			 ?>


						<div class="grid__item <?php echo $product_title; ?>">
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

			<?php endforeach; ?>

<!-- end SPIEGELGRACHT watches -->


<!-- AWCO watches -->
			<?php
			// copy file content into a string var
			$json_file = file_get_contents('https://extraction.import.io/query/extractor/efd1829b-3aa1-4252-81c2-ed5bf08fbd28?_apikey=51b3d087f64c4de5a73f6f27c1d714a6c66679dc30641a332e5dbb4fc5caaf935aaa4fcd88f1fbf729af7b1b0db026726f31412a8c7b8d57ac5ae75cac86167c214dcf7829668d2153e818fc499ba0d4&url=http%3A%2F%2Fawco.nl%2Fproduct-categorie%2Fvintage-collectie');
			// convert the string to a json object
			$jfo = json_decode($json_file);
			// read the title value
			$title = $jfo->extractorData->url;
			// copy the posts array to a php var
			$data = $jfo->extractorData->data[0]->group;

			?>

			<?php foreach($data as $watch): ?>

			<?php 
				$product_title = $watch->{'Productname link'}[0]->text;
				$product_img = $watch->{'Product image'}[0]->src;
				$product_price = $watch->{'Amount price'}[0]->text;
			 ?>


						<div class="grid__item <?php echo $product_title; ?>">
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

			<?php endforeach; ?>

<!-- end AWCO watches -->


<!-- Amsterdamvintagewatches watches -->
			<?php
			// copy file content into a string var
			$json_file = file_get_contents('https://extraction.import.io/query/extractor/408aa808-ce90-4d3d-adc9-a3bcd8d99c4d?_apikey=51b3d087f64c4de5a73f6f27c1d714a6c66679dc30641a332e5dbb4fc5caaf935aaa4fcd88f1fbf729af7b1b0db026726f31412a8c7b8d57ac5ae75cac86167c214dcf7829668d2153e818fc499ba0d4&url=https%3A%2F%2Famsterdamvintagewatches.com%2Fnl%2F3-polshorloges%23%2Fshow-all');
			// convert the string to a json object
			$jfo = json_decode($json_file);
			// read the title value
			$title = $jfo->extractorData->url;
			// copy the posts array to a php var
			$data = $jfo->extractorData->data[0]->group;

			?>

			<?php foreach($data as $watch): ?>

			<?php 
				$product_title = $watch->{'Productname link'}[0]->text;
				$product_img = $watch->{'Productimg image'}[0]->src;
				$product_price = $watch->{'Product price'}[0]->text;
			 ?>


						<div class="grid__item <?php echo $product_title; ?>">
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

			<?php endforeach; ?>

<!-- end Amsterdamvintagewatches watches -->


		</section>
		<!-- /grid-->
	</div>
	<!-- /view -->
	<script src="js/isotope.pkgd.min.js"></script>
	<script src="js/flickity.pkgd.min.js"></script>
	<script src="js/main.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="js/search.js"></script>



</body>
</html>