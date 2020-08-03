<?php

	include "../sess.php";
	if(isset($_SESSION['gid'])){ 
		include '../dbconnect.php';
		$id=$_SESSION['id'];
		$qer="select uname,uemail,phone from users where uid='$id'";	
		$qes=mysqli_query($con,$qer);
		$data= mysqli_fetch_assoc($qes);
				
	}
	else  header('location:../index.php');
?>
<!DOCTYPE html>
	<html>
		<?php include 'layout/head.php';?>
		
		<body>
			
			<?php include 'layout/header.php';?>

					 
			<!--login-->
			<div class="login-page">
				<div class="widget-shadow">
					<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
						<?php 
							if(isset($_GET['error']))
							{
								include '../errors/error'.$_GET['error'].'.php';
								
								
							} elseif (isset($_GET['success'])) {
								$message = "Account updated successfully";
								include '../notification/success.php';
							}
						?>

						<form method="post" action="AdminController.php">
							<h4>Name:</h4> <input type="text" class="user" name="name" value="<?php echo $data['uname']; ?>">
							<h4>Email:</h4> <input type="text" class="user" name="email" value="<?php echo $data['uemail']; ?>">
							<h4>Phone number</h4><input type="text" class="user" name="phone" value="<?php echo $data['phone']; ?>">
							<input type="submit" name="update" value="update">
						</form>
					</div>
				</div>
			</div>
			<!--//login-->
			
			<?php include 'layout/footer.php';?>			
			<!--search jQuery-->
			<script src="../js/main.js"></script>
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
			<script src="../js/bootstrap.js"></script>
		</body>
	</html>



