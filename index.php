<?php include 'sess.php'; ?>
<?php
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
		<?php include 'layout/head.php'; ?>
		<body>
			<!--header-->
			<?php include 'layout/header.php'; ?>
			<!--//header-->
			
			<!--banner-->
			<div class="banner">
				<div class="container">
					<div class="banner-text">			
						<div class="col-sm-5 banner-left wow fadeInLeft animated" data-wow-delay=".5s">			
							<h2>On Entire Fashion range</h2>
							<h3>Coming Soon </h3>
							<h4>Our New Designs</h4>
							<div class="count main-row">
								<ul id="date">
									<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
									<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
									<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
								</ul>
									<div class="clearfix"> </div>
									<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
									<script type="text/javascript">
										$('#date').countdown({
											date: '12/24/2020 15:59:59',
											offset: -8,
											day: 'Day',
											days: 'Days'
										}, function () {
											alert('Done!');
										});
									</script>
							</div>

						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>			
			<!--//banner-->
			
			<!--new-->
			<div class="new">
				<div class="container">
					<div class="title-info wow fadeInUp animated" data-wow-delay=".5s">
						<h3 class="title">New <span>Arrivals</span></h3>
					</div>
					<div class="new-info">
						<?php  foreach ($list as &$v) : ?>

						<div class="col-md-3 new-grid simpleCart_shelfItem wow flipInY animated" data-wow-delay=".5s">
							<div class="new-top">
								<a href="single.php?productid=<?=  base64_encode($v['pid']); ?>"><img src="images/productImages/<?php echo image($v['pid']);?>" class="img-responsive" alt=""/></a>
								<div class="new-text">
									<ul>
										<li><a class="item_add" href=""> Add to cart</a></li>
										<li><a href="single.php?productid=<?=  base64_encode($v['pid']) ?>">Quick View </a></li>
									</ul>
								</div>
							</div>
							<div class="new-bottom">
								<h5><a class="name" href="single.php?productid=<?=  base64_encode($v['pid']); ?>"><?=  $v['name'] ?> </a></h5>
								<div class="rating">
									
								</div>	
								<div class="ofr">
									<p>PKR <span class="item_price"><?= $v['price']?>/-</span></p>
								</div>
							</div>
						</div>
								  <?php  endforeach;  ?>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>		
			<!--//new-->
			
			<!--footer-->
				<?php  include "layout/footer.php"; ?>
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
			<script src="js/bootstrap.js"></script>
		</body>
	</html>
