
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
	<link rel="shortcut icon" href="images/favicon.ico">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!-- Pixel Fabric clothes icons -->
	<link rel="stylesheet" type="text/css" href="fonts/pixelfabric-clothes/style.css" />
	<!-- General demo styles & header -->
	<link rel="stylesheet" type="text/css" href="css/demo_flickity_wca.css" />
	<!-- Component styles -->
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src='js/lazyload.min2.js'></script>
	<!--<script src='js/console_runner.js'></script>-->
	<!--<script src='js/live_reload.js'></script>-->
	<!--<script src='js/event_runner.js'></script>-->
	<!--<script src="js/modernizr.custom.js"></script>-->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-83254444-1', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body>

	<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MBLLNV"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-MBLLNV');</script>
		<!-- End Google Tag Manager -->

<!-- Start menu -->
<span style="font-size:40px;cursor:pointer;color:#fff;position:absolute;margin-right:40px;margin-top:40px;right:0;" onclick="openNav()">&#9776;</span>


<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content" style="max-width:800px;margin:auto;">
    <a href="#" style="">About<br>
    	<span style="font-size:20px;" > Op watchclubamsterdam.com kun je gemakkelijk alle vintage horloges doorzoeken van verschillende winkels in Amsterdam.
    </span></a>
    <div style="margin:15px;display:inline-block;"><img src="images/awco_logo.png" class="store awco"></div>
    <div style="margin:15px;display:inline-block;"><img src="images/avw_logo.png" class="store avw"></div>
    <div style="margin:15px;display:inline-block;"><img src="images/spiegel_logo.png" class="store spiegel"></div>
    <div style="margin:15px;display:inline-block;"><img src="images/logo_bruens.jpg" class="store bruens"></div>
 
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
<!-- End menu -->

<!--<div> test github -->
	<!-- Main view -->
	<div class="view">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			
			<h1><img src="images/logo_wca.png" class="wca_logo" > 
			<div class="fb-follow" style="display:block;" data-layout="button">
			<a href="https://www.facebook.com/watchclubamsterdam/" style="text-decoration: none;border:none;" target="_blank">
			<img src="images/fb_follow.png" width="85">
			</a></div></h1>
		
		</header>


		<!-- Search -->
		<!--<input type="text" class="quicksearch" placeholder="Search" />-->
		<h3 style = "text-align: center;font-size: 24px;margin-bottom: 0px;color:#333;">Search results for '<?php
		$search_key = $_GET['key'];
		$minprice = $_GET['min'];
		$maxprice = $_GET['max'];
		echo $search_key;
		?>'
		</h3>
		<p style = "text-align: center;font-size: 18px;margin-bottom: 0px;margin-top:6px;color:#666;">with price between €<?php echo $minprice; ?> and €<?php echo $maxprice; ?></p>
		<!-- Grid -->
		<section class="grid">
			<!-- Loader -->
			<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
			<!-- Grid sizer for a fluid Isotope (Masonry) layout -->
			<div class="grid__sizer"></div>
			<!-- Grid items -->
			

	<!-- AWCO watches // from DB-->
			<?php
				// connect to database

				$servername = "****";
				$username = "****";
				$password = "****";
				$dbname = "****";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);

				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				} 
			?>

			<?php
				$search_key = $_GET['key'];
				$minprice = $_GET['min'];
				$maxprice = $_GET['max'];
				$dequery = "select * from watchclub_data where date(watchclub_data.timestamp) = (SELECT MAX(date(timestamp)) FROM watchclub_data ) and (watch_title_1 like '%";
				$minprice_query = "and price >= ";
				$maxprice_query = " and price < ";
				$full_query = "$dequery".$search_key."%' or watch_title_2 like '%".$search_key."%')". $minprice_query . $minprice . $maxprice_query . $maxprice . " and price > 0 order by store";
				$result = mysqli_query($conn,$full_query);
		
				while($row = mysqli_fetch_array($result)){  ?>
				
				<?php 
				if ($row['store'] == "AWCO") { ?>

				<div class="grid__item element-item <?php echo $row['watch_title_1']; ?>"><a href="<?php echo $row['url']; ?>" target="_blank"><div class="slider"><div class="slider__item"><img data-frz-src="<?php echo $row['image']; ?>" src="images/placeholder_tall.png" onload=lzld(this) onerror=lzld(this)/></div></div><div class="meta"><h3 class="meta__title"><?php echo $row['watch_title_1']; ?><br><?php echo $row['watch_title_2']; ?></h3><span class="meta__brand">
				
				<?php 
				if ($row['price'] !== "0") {
				    echo '€ ', $row['price'];
				} ?> 

				</span></div></a></div>


			<?php } elseif ($row['store'] == "AVW") { ?>

					<div class="grid__item element-item <?php echo $row['watch_title_1']; ?>"><a href="<?php echo $row['url']; ?>" target="_blank"><div class="slider"><div class="slider__item"><img data-frz-src="<?php echo $row['image']; ?>" src="images/placeholder_square.png" onload=lzld(this) onerror=lzld(this)/></div></div><div class="meta"><h3 class="meta__title"><?php echo $row['watch_title_1']; ?><br><?php echo $row['watch_title_2']; ?></h3><span class="meta__brand">
					

			<?php 
			if ($row['price'] !== "0") {
			    echo '€ ', $row['price'];
			}
			?> 

			</span></div></a></div>


			<?php } elseif ($row['store'] == "Spiegel") { ?>

					<div class="grid__item element-item <?php echo $row['watch_title_1']; ?>"><a href="<?php echo $row['url']; ?>" target="_blank"><div class="slider"><div class="slider__item"><img data-frz-src="<?php echo $row['image']; ?>" src="images/placeholder_square.png" onload=lzld(this) onerror=lzld(this)/></div></div><div class="meta"><h3 class="meta__title"><?php echo $row['watch_title_2']; ?></h3><span class="meta__brand">
					

			<?php 
			if ($row['price'] !== "0") {
			    echo '€ ', $row['price'];
			}
			?> 

			</span></div></a></div>

				<?php } ?>

			
			
	
			<? }
				$conn->close();
			?>

	<!-- end AWCO watches // from DB -->

	

		</section>
		<!-- /grid-->
	</div>
	<!-- /view -->
	<!--<script src="js/flickity.pkgd.min.js"></script>-->
	<!--<script src="js/main.js"></script>-->
	<!--<script src='js/timeout.js'></script>-->
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src="js/isotope.pkgd.min.js"></script>
	
	<!--<script src="js/jquery.lazy.min.js"></script>-->
	<script type="text/javascript" charset="utf-8">
	$(function() {
        $('.lazy').Lazy();
    });
         
  	</script>


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