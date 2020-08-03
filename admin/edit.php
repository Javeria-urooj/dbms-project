<?php 
include '../sess.php';
if(isset($_GET['productid'])){
    $id= addslashes(base64_decode($_GET['productid']));
 include "../dbconnect.php";
$qer="select * from products where pid='$id'";	
$qes=mysqli_query($con,$qer); 
if(mysqli_num_rows($qes)>0){
$str=mysqli_fetch_assoc($qes);

$qer="select * from products limit 4";	
$qes=mysqli_query($con,$qer);
$list=array();
while($row= mysqli_fetch_assoc($qes)){
    $list[]=$row;
}


	$qer="select * from product_size where product_id=$id";	
	$qes=mysqli_query($con,$qer);
	$product_sizes=array();
	while($row= mysqli_fetch_assoc($qes)){
		$product_sizes[] = $row['size_id'];
	}

	$qer="select * from size";	
	$qes=mysqli_query($con,$qer);
	$sizes=array();
	while($row= mysqli_fetch_assoc($qes)){
		$size["id"] = $row["sid"];
		$size["size"] = $row["size"];
		array_push($sizes,$size);
	}

	$qer="select * from product_color where product_id=$id";	
	$qes=mysqli_query($con,$qer);
	$product_colors=array();
	while($row= mysqli_fetch_assoc($qes)){
		$product_colors[] = $row['color_id'];
	}

	$qer="select * from color";	
	$qes=mysqli_query($con,$qer);
	$colors=array();
	while($row= mysqli_fetch_assoc($qes)){
		$color["id"] = $row["cid"];
		$color["color"] = $row["color"];
		array_push($colors,$color);
	}
	function getImages($id){
		 include "../dbconnect.php";
	
		$qer="select image from images where id=$id";	
		$qes=mysqli_query($con,$qer);
		$data= mysqli_fetch_assoc($qes);
		return $data['image'];
	}

	$qer="select * from product_images where product_id=$id";	
	$qes=mysqli_query($con,$qer);
	$image=array();
	while($row= mysqli_fetch_assoc($qes)){
		$image[]=getImages($row['image_id']);
	}
	// print_r($image);die;
	
	

}else header('location:../index.php');


  }else header('location:../index.php');
?>

<!DOCTYPE html>
<html>
<?php include 'layout/head.php';?>
<body>
	<?php include 'layout/header.php';?>

	<!--breadcrumbs-->
<div id="error"></div>
<div id="state"></div>
	<div class="single">
		<div class="container">
			<div class="single-info">		
				<div class="col-md-6 single-top wow fadeInLeft animated" data-wow-delay=".5s">	
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="../images/productImages/<?php echo $image['0'];?>">
								<div class="thumb-image"> <img src="../images/productImages/<?php echo $image['0'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="../images/productImages/<?php echo $image['1'];?>">
								 <div class="thumb-image"> <img src="../images/productImages/<?php echo $image['1'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li>
							<li data-thumb="../images/productImages/<?php echo $image['2'];?>">
							   <div class="thumb-image"> <img src="../images/productImages/<?php echo $image['2'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
							</li> 
						</ul>
					</div>
				</div>
				<div class="col-md-6 single-top-left simpleCart_shelfItem wow fadeInRight animated" data-wow-delay=".5s">
					<form method="post" enctype="multipart/form-data" action="ProductController.php">
						
                        <input type="hidden" name="pid"value="<?php echo $id;?>"> 
						<font color="red" size="4">Name :  </font></td> &nbsp; &nbsp;                
                        <input type="text" name="name" size="37" value="<?php echo $str['name'];?>">   
						<div class="clearfix"> </div><br>

						<font color="red" size="4">Price :  </font> &nbsp; &nbsp;  &nbsp;   
                        <input type="text" name="price" value="<?php echo $str['price'];?>">						
						<div class="clearfix"> </div><br>
					
                        <font color="red" size="4">Sizes :  </font> &nbsp;&nbsp;&nbsp;&nbsp;
                        <select id="size" name="size[]" multiple>
							 <?php foreach($sizes as $key => $size) {
								$done = false;
							
								foreach($product_sizes as $prod_size) {
									if($size["id"] == $prod_size) {
										echo '<option   value='.$size["id"].' selected>'.$size["size"].'</option>';
										$done = true;
										break;
									} else {
										$done = false;
									}
								}
							
							if(!$done) {
								echo '<option   value='.$size["id"].'>'.$size["size"].'</option>';
							}
							
						}?>
						</select>
                        <div class="clearfix"> </div><br>
                        
						<font color="red" size="4">Colors :  </font>&nbsp;&nbsp;
                        <select id="color" name="colors[]" multiple>
						<?php foreach($colors as $key => $color) {
							$done = false;
							foreach($product_colors as $prod_color) {
								if($color["id"] == $prod_color) {
									echo '<option   value='.$color["id"].' selected>'.$color["color"].'</option>';
									$done = true;
									break;
								} else {
									$done = false;
								}
							}
							
							if(!$done) {
								echo '<option   value='.$color["id"].'>'.$color["color"].'</option>';
							}
							
						}?>
							
                        </select>
					
						<div class="clearfix"> </div><br>
					
						<font color="red" size="4">Qty :  </font>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input min="1" type="number" name="qnt" value="<?php echo $str['qunt'];?>">
						<div class="clearfix"> </div><br>
						
						<font color="red" size="4">Description :  </font>
						<p>&nbsp;<textarea  cols="37" rows="3" name="description"><?php echo $str['description'];?></textarea> </p>
						<div class="clearfix"> </div><br>
                                        
						<font color="red" size="4">Images :  </font>
						<input id="fileupload" class="image" type="file" name="image[]" accept="image/*" multiple>
                                       
						<div class="clearfix"> </div><br><div class="clearfix"> </div><br>
                        <input type="submit" name="update" value="Update">	
					</form>
                                    
				</div>
			   <div class="clearfix"> </div>
			</div>
					
		</div>
	</div>
	<!--//single-page-->
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
						<input type="text" placeholder="Enter Your Email" required>
						<input type="submit" value="Go">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//footer-->			
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
