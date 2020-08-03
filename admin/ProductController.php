<?php

include "../sess.php";
include '../dbconnect.php';
if(isset($_GET['productid'])){
    $id= addslashes(base64_decode($_GET['productid']));
	$qer="select * from product_images where product_id=$id";	
	$qes=mysqli_query($con,$qer);
	$product_images=array();
	while($row= mysqli_fetch_assoc($qes)){
		$product_images[] = $row['image_id'];
	}
	
	$query = "DELETE FROM product_images WHERE product_id=$id";
	$result=mysqli_query($con, $query);
	if($result = true) {
		foreach($product_images as $image){
			deleteImages($image);
		}
	}
	
	$query = "DELETE FROM product_size WHERE product_id=$id";
	$result=mysqli_query($con, $query);
	
	$query = "DELETE FROM product_color WHERE product_id=$id";
	$result=mysqli_query($con, $query);
	
	$query = "DELETE FROM products WHERE pid=$id"; 
	$result=mysqli_query($con, $query);
	header('location:home.php');	
}

function deleteImages($image_id){
    $qer="DELETE FROM images WHERE image_id=$image_id";	
	$qes=mysqli_query($con,$qer);
	return;
}

$pid = $_POST["pid"];

if(  $_FILES["image"]["size"][0] != 0 ) {
	if(isset($_POST['update'])){
		$target_dir = "../images/productImages/";
		$i = 0;
	
		$query = "DELETE FROM product_images WHERE product_id=".$_POST['pid'];
		$result=mysqli_query($con, $query);
		foreach($_FILES["image"]["name"] as $key => $file){
			$file_name = uniqid(). basename($file);
			$target_file = $target_dir .$file_name;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_file);
			
			$query = "INSERT into images (image) values ('$file_name')";
			if($sql = mysqli_query($con, $query)){
				$query = "INSERT into product_images (product_id,image_id) values ($pid,".mysqli_insert_id($con).")";
				$sql = mysqli_query($con, $query);
			}
			$i++;			
		}
	}
}

if(isset($_POST['update'])){
	if(isset($_POST['size'])) {
		$str="DELETE FROM product_size WHERE product_id=$pid";
		mysqli_query($con,$str);
		foreach($_POST['size'] as $size){
			$query = "INSERT into product_size (product_id, size_id) values ($pid,$size);";
			$sql = mysqli_query($con,$query);
		}
		
	}
	
	if(isset($_POST['colors'])) {
		$str="DELETE FROM product_color WHERE product_id=$pid";
		mysqli_query($con,$str);
		foreach($_POST['colors'] as $color){
			$query = "INSERT into product_color (product_id, color_id) values ($pid,$color);";
			$sql = mysqli_query($con,$query);
		}
	}
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$qnt = $_POST['qnt'];
	$str="update products set name='$name',price='$price',description='$description',qunt='$qnt' where pid='$pid'";
	$qer=mysqli_query($con,$str);
    header("Location:".$_SERVER['HTTP_REFERER']);
}
?>
