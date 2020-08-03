
<!DOCTYPE html>
<html>
<!--head-->
<?php include 'layout/head.php';?>
<!--head-->
<body>
	<!--header-->
	<?php include 'layout/header.php';?>
	<!--//header-->
	<!--cart-items-->
	<div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">My Shopping Cart(3)</h3>
			<div class="cart-header wow fadeInUp animated" data-wow-delay=".5s">
				<div class="alert-close"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.html"><img src="images/g1.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.html"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
							<p>Service Charges : $10.00</p>
							<span>Delivered in 1-1:30 hours</span>
							<div class="clearfix"></div>
						</div>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="cart-header1 wow fadeInUp animated" data-wow-delay=".7s">
				<div class="alert-close1"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.html"><img src="images/g5.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.html"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
						<p>Service Charges : $10.00</p>
						<span>Delivered in 1-1:30 hours</span>
						<div class="clearfix"></div>
					</div>	
				   </div>
				   <div class="clearfix"></div>
				</div>
			</div>
			<div class="cart-header2 wow fadeInUp animated" data-wow-delay=".9s">
				<div class="alert-close2"> </div>
				<div class="cart-sec simpleCart_shelfItem">
					<div class="cart-item cyc">
						<a href="single.html"><img src="images/g9.jpg" class="img-responsive" alt=""></a>
					</div>
					<div class="cart-item-info">
						<h4><a href="single.html"> Lorem Ipsum is not simply </a><span>Pickup time :</span></h4>
						<ul class="qty">
							<li><p>Min. order value :</p></li>
							<li><p>FREE delivery</p></li>
						</ul>
						<div class="delivery">
							<p>Service Charges : $10.00</p>
							<span>Delivered in 1-1:30 hours</span>
							<div class="clearfix"></div>
						</div>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>		
		</div>
	</div>
	<!--//cart-items-->	
	<!--footer-->
	<div class="footer">
		<div class="container">
			<div class="footer-info">
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".5s">
					<h4 class="footer-logo"><a href="index.html">Modern <b>Shoppe</b> <span class="tag">Everything for Kids world </span> </a></h4>
					<p>© 2016 Fashion Worlde . All rights reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
				</div>
				<div class="col-md-4 footer-grids wow fadeInUp animated" data-wow-delay=".7s">
					<h3>Popular</h3>
					<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="products.html">new</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						<li><a href="faq.html">FAQ</a></li>
						<li><a href="checkout.html">Wishlist</a></li>
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