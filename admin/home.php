<?php 
include '../sess.php';
if(isset($_SESSION['id'])){
  $userid=$_SESSION['id'];
  
 include "../dbconnect.php";
	$str="select * from products";
	$query= mysqli_query($con, $str);
	$array=array();
	$i=1;
	$count= mysqli_num_rows($query);
	while($row=mysqli_fetch_assoc($query)){
		$array[]=$row;
	}

function size($pid){
    include "../dbconnect.php";
	$qer="select size_id from product_size where  product_id=$pid";	
	$qes=mysqli_query($con,$qer);
	$ar=array();
	while($row= mysqli_fetch_assoc($qes)){
		$ar[]=getProdSize($row['size_id']);
	}
	
	return implode(', ', $ar);
}

function getProdSize($size_id){
    include '../dbconnect.php';
    $qer="select * from size where sid=$size_id";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes);
    return $data['size'];
}

function image($pid){
    include "../dbconnect.php";
	$qer="select image_id from product_images where  product_id=$pid";	
	$qes=mysqli_query($con,$qer);
	$ar=array();
	while($row= mysqli_fetch_assoc($qes)){
		$ar[]=getProdImage($row['image_id']);
	}
	
	return $ar[0];
}

function getProdImage($image_id){
    include '../dbconnect.php';
    $qer="select * from images where id=$image_id";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes);
    return $data['image'];
}

function getProdColor($color_id){
    include '../dbconnect.php';
    $qer="select * from color where cid=$color_id";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes);
    return $data['color'];
}

function color($pid){
    include '../dbconnect.php';
	$qer="select color_id from product_color where product_id=$pid";	
	$qes=mysqli_query($con,$qer);
	$ar2=array();
	while($row= mysqli_fetch_assoc($qes)){
		$ar2[]=getProdColor($row['color_id']);
	}
	return implode(', ', $ar2);
}




  }else header('location:../index.php');
?>
<!DOCTYPE html>
<html>
<?php include 'layout/head.php';?>
<body>
	<!--header-->
	<?php include 'layout/header.php';?>
	<!--header-->
	
	<div class="cart-items">
		<div class="container">
			<h3 class="wow fadeInUp animated" data-wow-delay=".5s">Products(<?php echo $count;?>)</h3>
            <?php foreach ($array as $v):?> 
				<div class="cart-header<?php echo $i;?> wow fadeInUp animated" data-wow-delay=".5s">
					<div class="alert-close1" id="<?php echo $i;$i++;?>"> </div>
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<a href="single.php?productid=<?=  base64_encode($v['pid']) ?>"><img src="../images/productImages/<?php echo image($v['pid']);?>" class="img-responsive" alt=""></a>
						</div>
						<div class="cart-item-info">
							<h4><a href="single.php?productid=<?=  base64_encode($v['pid']) ?>"> <?= $v['name']?> </a></h4>
								<div class="single-rating">
									<!-- Ratings table -->
									<table>
										<tr>
											<td>
												<span class="starRating">
													<input id="rating5" type="radio" name="rating" value="5" checked>
													<label for="rating5">5</label>
													<input id="rating4" type="radio" name="rating" value="4">
													<label for="rating4">4</label>
													<input id="rating3" type="radio" name="rating" value="3">
													<label for="rating3">3</label>
													<input id="rating2" type="radio" name="rating" value="2">
													<label for="rating2">2</label>
													<input id="rating1" type="radio" name="rating" value="1">
													<label for="rating1">1</label>
												</span>
											</td>
											<td>
												<p>&nbsp;<?php echo $v['rate'];?> out of 5</p>
											</td>
										</tr>
									</table>
									<!-- Ratings table -->								
									<br>
									<font color="Red" size="5"><b>Price : </b></font><span><font size="5">PKR <?php echo $v['price'];?>  /- </font></span><br>
									<font color="Red" size="5"><b>Sizes : </b></font><span><font size="5"><?php echo size($v['pid']);?> </font></span> <br>
									<font color="Red" size="5"><b>Colors : </b></font><span><font size="5"><?php echo color($v['pid']);?>  </font></span> <br>
								
									<table>
										<tr>
											<td> 
												<div class="btn_form">
													<a href="edit.php?productid=<?=  base64_encode($v['pid']) ?>">EDIT</a>	
												</div>
											</td>
											<td>&nbsp; &nbsp; &nbsp;</td>
											<td> 
												<div class="btn_form">
													<a href="ProductController.php?productid=<?=  base64_encode($v['pid'])?>">DELETE</a>	
												</div>
											</td>
										</tr>
									</table>
								</div>	
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			<?php?>
		   <?php ;endforeach;?> 
                        
		</div>
	</div>
	<!--//cart-items-->	
	<!--footer-->
	<?php include 'layout/footer.php';?>			
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