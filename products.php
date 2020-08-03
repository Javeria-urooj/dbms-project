<?php 
include 'sess.php';
include "dbconnect.php";
$qer="select * from products";	
$qes=mysqli_query($con,$qer);
$list=array();
while($row= mysqli_fetch_assoc($qes)){
    $list[]=$row;
}


function size($pid){
    include "dbconnect.php";
	$qer="select size_id from product_size where  product_id=$pid";	
	$qes=mysqli_query($con,$qer);
	$ar=array();
	while($row= mysqli_fetch_assoc($qes)){
		$ar[]=getProdSize($row['size_id']);
	}
	
	return implode(', ', $ar);
}

function getProdSize($size_id){
    include 'dbconnect.php';
    $qer="select * from size where sid=$size_id";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes);
    return $data['size'];
}

function image($pid){
    include "dbconnect.php";
	$qer="select image_id from product_images where  product_id=$pid";	
	$qes=mysqli_query($con,$qer);
	$ar=array();
	while($row= mysqli_fetch_assoc($qes)){
		$ar[]=getProdImage($row['image_id']);
	}
	
	return $ar[0];
}

function getProdImage($image_id){
    include 'dbconnect.php';
    $qer="select * from images where id=$image_id";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes);
    return $data['image'];
}

function getProdColor($color_id){
    include 'dbconnect.php';
    $qer="select * from color where cid=$color_id";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes);
    return $data['color'];
}

function color($pid){
    include 'dbconnect.php';
	$qer="select color_id from product_color where product_id=$pid";	
	$qes=mysqli_query($con,$qer);
	$ar2=array();
	while($row= mysqli_fetch_assoc($qes)){
		$ar2[]=getProdColor($row['color_id']);
	}
	return implode(', ', $ar2);
}

?>


<!DOCTYPE html>
<html>
<head>
<title>E-commerce</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashion Worlde Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--//for-mobile-apps -->
<!--Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//Custom Theme files -->
<!--js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<!--//js-->
<!--cart-->
<script src="js/simpleCart.min.js"></script>
<!--cart-->
<!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
<!--web-fonts-->
<!--animation-effect-->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--//animation-effect-->
<!--start-smooth-scrolling-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
                        
                          $('#pro').on('change', function() {
                         $.post(  
                  "users.php", 
                  { action: "logout" }, 
                  function(data) { 
                      location.reload(true);
                  } 
               );
    
                        
});
		});
</script>
<!--//end-smooth-scrolling-->
</head>
<body>
	<!--header-->
	<!--//header-->
	<!--breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Products</li>
			</ol>
		</div>
	</div>
	<!--//breadcrumbs-->
	<!--products-->
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-model-sec">
			
				 <?php  foreach ($list as &$v) : ?>
				<div class="product-grids simpleCart_shelfItem wow fadeInUp animated" data-wow-delay=".9s">
					<div class="new-top">
						<a href="single.php?productid=<?=  base64_encode($v['pid']) ?>"><img src="images/<?=  $v['img'] ?>" class="img-responsive" alt=""/></a>
						<div class="new-text">
							<ul>
								<li><a href="single.php?productid=<?=  base64_encode($v['pid']) ?>">Quick View </a></li>
								<li><input type="number" class="item_quantity" min="1" value="1"></li>
								<li><a class="item_add" href=""> Add to cart</a></li>
							</ul>
						</div>
					</div>
					<div class="new-bottom">
						<h5><a class="name" href="single.php?productid=<?=  base64_encode($v['pid']) ?>">Bear Diaper Bag</a></h5>
						<div class="rating">
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span class="on">☆</span>
							<span>☆</span>
						</div>
						<div class="ofr">
							<p class="pric1"><del>$570</del></p>
							<p><span class="item_price"><?=  $v['price'] ?></span></p>
						</div>
					</div>
				</div>
				
                            <?php  endforeach;  ?>
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Filter By Price</h4>            
						<div id="slider-range"></div>							
						<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
						<!---->
						<script type='text/javascript'>//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 1000, 7000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  
						</script>
						<script type="text/javascript" src="js/jquery-ui.js"></script>
						<!---->
					</div>
					<div class="sidebar-row">
						<h4> Clothes & Shoes </h4>
						<ul class="faq">
							<li class="item1"><a href="#">Frocks & Dresses<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Party Wear</a></li>										
									<li class="subitem1"><a href="#">Night Wear</a></li>										
									<li class="subitem1"><a href="#">Bath Time</a></li>										
								</ul>
							</li>
							<li class="item2"><a href="#">Shorts & Jeans<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Girls</a></li>										
									<li class="subitem1"><a href="#">Boys</a></li>										
									<li class="subitem1"><a href="#">Baby by age</a></li>										
								</ul>
							</li>
							<li class="item3"><a href="#">Protection <span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Sweaters</a></li>										
									<li class="subitem1"><a href="#">Rain Jackets</a></li>										
									<li class="subitem1"><a href="#">Caps & Gloves</a></li>										
								</ul>
							</li>
						</ul>
						<!-- script for tabs -->
						<script type="text/javascript">
							$(function() {
							
								var menu_ul = $('.faq > li > ul'),
									   menu_a  = $('.faq > li > a');
								
								menu_ul.hide();
							
								menu_a.click(function(e) {
									e.preventDefault();
									if(!$(this).hasClass('active')) {
										menu_a.removeClass('active');
										menu_ul.filter(':visible').slideUp('normal');
										$(this).addClass('active').next().stop(true,true).slideDown('normal');
									} else {
										$(this).removeClass('active');
										$(this).next().stop(true,true).slideUp('normal');
									}
								});
							
							});
						</script>
						<!-- script for tabs -->
					</div>
					<div class="sidebar-row">
						<h4>DISCOUNTS</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Upto - 10% (20)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>70% - 60% (5)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>50% - 40% (7)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (2)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (5)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
						</div>
					</div>
					<div class="sidebar-row">
						<h4>Color</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>White</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Pink</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gold</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Silver</label>
						</div>
					</div>			 
				</div>
				<div class="gallery-grid ">
					<h6>YOU MAY ALSO LIKE</h6>
					<a href="single.php"><img src="images/b1.png" class="img-responsive" alt=""/></a>
					<div class="gallery-text simpleCart_shelfItem">
						<h5><a class="name" href="single.php">Full Sleeves Romper</a></h5>
						<p><span class="item_price">60$</span></p>
						<h4 class="sizes">Sizes: <a href="#"> s</a> - <a href="#">m</a> - <a href="#">l</a> - <a href="#">xl</a> </h4>
						<ul>
							<li><a href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></a></li>
							<li><a class="item_add" href="#"><span class="glyphicon glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
							<li><a href="#"><span class="glyphicon glyphicon glyphicon-heart-empty" aria-hidden="true"></span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//products-->
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-info">
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
					<h4 class="footer-logo"><a href="index.php">Modern <b>Shoppe</b> <span class="tag">Everything for Kids world </span> </a></h4>
					<p>© 2016 Fashion Worlde . All rights reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
				</div>
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
					<h3>Popular</h3>
					<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="products.php">new</a></li>
						<li><a href="contact.php">Contact Us</a></li>
						<li><a href="faq.php">FAQ</a></li>
						<li><a href="checkout.php">Wishlist</a></li>
					</ul>
				</div>
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".9s">
					<h3>Subscribe</h3>
					<p>Sign Up Now For More Information <br> About Our Company </p>
					<form>
						<input type="text" placeholder="Enter Your Email" required="">
						<input type="submit" value="Go">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//footer-->			
	<!-- the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
			<script type="text/javascript" id="sourcecode">
				$(function()
				{
					$('.scroll-pane').jScrollPane();
				});
			</script>
	<!-- //the jScrollPane script -->
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
	<!-- the mousewheel plugin -->
	<!--search jQuery-->
	<script src="js/main.js"></script>
	<!--//search jQuery-->
	<!--smooth-scrolling-of-move-up-->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!--//smooth-scrolling-of-move-up-->
	<!--Bootstrap core JavaScript
    ================================================== -->
    <!--Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
</body>
</html>