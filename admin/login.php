
<!DOCTYPE html>
<html>
<?php include 'layout/head.php' ?>
<body>
	<!--header-->
	<?php include 'layout/header.php' ?>
	<!--//header-->

             
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
		<div class="widget-shadow">
			<div class="login-top wow fadeInUp animated" data-wow-delay=".7s">
				<h4>Admin Login</h4>
			</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
				<?php 
					if(isset($_GET['error']))
					{
						switch($_GET['error']){
							case 1:
						include '../errors/error2.php';
						break;
						}
					}
				?>
				<form method="post" action="loginController.php">
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<input type="password" name="password" class="lock" placeholder="Password">
					<input type="submit" name="signin" value="Sign In">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
		</div>
     </div>
	<!--//login-->
	
	<!--footer-->
	<?php include 'layout/footer.php';?>
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