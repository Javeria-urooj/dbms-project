<div class="header">
	<?php if(!isset($_SESSION['id']))   include 'head/alert.php'; ?>
	<div class="header-two navbar navbar-default">
	<!--header-two-->
		<div class="container">
			<div class="nav navbar-nav header-two-left">
				<ul>
					<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+92 306 3112501</li>
					<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">javeria.urooj1@gmail.com</a></li>		
				</ul>
			</div>
			<div class="nav navbar-nav logo wow zoomIn animated" data-wow-delay=".7s">
				<h1><a href="index.php">Fashion <b>World</b></a></h1>
			</div>
			<div class="nav navbar-nav navbar-right header-two-right">
				<div class="header-right my-account">
					 <?php if(isset($_SESSION['id'])) include 'head/select.php'; ?>
				</div>
				<div class="header-right cart">
					<a href="#"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a>
					<h4><a href="checkout.php">
							<span class="simpleCart_total"> $0.00 </span> (<span id="simpleCart_quantity" class="simpleCart_quantity"> 0 </span>) 
					</a></h4>
					<div class="cart-box">
						<p><a href="javascript:;" class="simpleCart_empty">Empty cart</a></p>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php include 'layout/menu.php';?>
</div>
			