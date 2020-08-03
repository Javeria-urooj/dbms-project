<?php 
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
	
?>