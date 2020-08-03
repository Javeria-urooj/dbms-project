<?php 

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
?>