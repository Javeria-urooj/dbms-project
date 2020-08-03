<?php

include "../sess.php";
if(isset($_SESSION['gid'])){ 
	include '../dbconnect.php';
	$id=$_SESSION['id'];
    $qer="select uname,uemail,phone from users where uid='$id'";	
	$qes=mysqli_query($con,$qer);
    $data= mysqli_fetch_assoc($qes); 
    
    $res= 'SELECT max(pid) as max FROM products';
	$qe=mysqli_query($con,$res);
	$last= mysqli_fetch_assoc($qe);
	$last=$last['max']+1;
	
	$qer="select * from size";	
	$qes=mysqli_query($con,$qer);
	$sizes=array();
	while($row= mysqli_fetch_assoc($qes)){
		$size["id"] = $row["sid"];
		$size["size"] = $row["size"];
		array_push($sizes,$size);
	}
	
	$qer="select * from color";	
	$qes=mysqli_query($con,$qer);
	$colors=array();
	while($row= mysqli_fetch_assoc($qes)){
		$color["id"] = $row["cid"];
		$color["color"] = $row["color"];
		array_push($colors,$color);
	}
          
 }
else  header('location:../index.php');

?>
<!DOCTYPE html>
<html>
	<?php include 'layout/head.php';?>
<body>
	<!--header-->
	<?php include 'layout/header.php';?>

             
	<!--//breadcrumbs-->
	<!--login-->
	<div class="login-page">
	 <div class="login-page-bottom">
          	</div>
		<div class="widget-shadow">
			<div class="alert alert-danger" role="alert" id="state" style="display:none">
					<strong id="error"></strong> 
				</div>
                    	<div class="alert alert-success" role="alert" id="state1" style="display:none">
					<strong id="success"></strong> 
				</div>
			<div class="login-body wow fadeInUp animated" data-wow-delay=".7s">
                     
                            <form method="post" action="" enctype="multipart/form-data">
                               Name: <input type="text" name="name" value="" placeholder="name">
                               Price: <input type="text" name="price"  placeholder="Price" >
                               Quantity: <input type="number" min="1" name="qunt" value="1"><br><br>
                               Color: &nbsp; &nbsp; &nbsp;<select id="color" name="colors[]" multiple>
                                 
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
							
                                          
                               </select><br><br>
                               
                                    Size: &nbsp;&nbsp; &nbsp; &nbsp;<select id="size" name="size[]" multiple>
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
						</select><br><br>
                                 <table><tr><td>Image:&nbsp;&nbsp; &nbsp;</td><td><input type="file" name="image[]" id="fileToUpload" accept="image/*" multiple></td></tr></table><br>
                                    
                                Description:<br><textarea name="description" rows="4" cols="52"></textarea>
                                    <input type="submit" name="new" style ="width:100%;margin-left:0px" value="Add">
					
				</form>
			</div>
		</div>
      
	</div>
	<!--//login-->
	<!--footer-->
	<?php include 'layout/footer.php';?>
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



<?php
echo "<script>document.getElementById(\"state\").style.display=\"none\";</script>";
echo "<script>document.getElementById(\"error\").innerHTML=\" \";</script>";
?>
<?php
if(isset($_POST['new'])){
	extract($_POST);
	$name = $_POST["name"];
	$price = $_POST["price"];
	$description = $_POST["description"];
	$qunt = $_POST["qunt"];
	$str="insert into products (name,price,description,qunt) values ('$name','$price','$description','$qunt')";
	$qer=mysqli_query($con,$str);
	$pid = mysqli_insert_id($con);	
	
	if(isset($_POST['size'])) {
		foreach($_POST['size'] as $size){
			$query = "INSERT into product_size (product_id, size_id) values ($pid,$size);";
			$sql = mysqli_query($con,$query);
		}
	}
	
	if(isset($_POST['colors'])) {
		foreach($_POST['colors'] as $color){
			$query = "INSERT into product_color (product_id, color_id) values ($pid,$color);";
			$sql = mysqli_query($con,$query);
		}
	}
	
	if(  $_FILES["image"]["size"][0] != 0 ) {
		
		$target_dir = "../images/productImages/";
		$i = 0;
		
		foreach($_FILES["image"]["name"] as $key => $file){
			$file_name = uniqid(). basename($file);
			$target_file = $target_dir .$file_name;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			$check = getimagesize($_FILES["image"]["tmp_name"]);
			if($check !== false) {
			   $uploadOk = 1;
			} else {
				echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
				echo "<script>document.getElementById(\"error\").innerHTML=\" File is not an image.\";</script>";
				$uploadOk = 0;
				exit;
			}
			
			if ($_FILES["fileToUpload"]["size"] > 2000000) {
				echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
				echo "<script>document.getElementById(\"error\").innerHTML+=\"Sorry, your file is too large.\";</script>";
				$uploadOk = 0;
				exit;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
				echo "<script>document.getElementById(\"error\").innerHTML+=\"Sorry, only JPG, JPEG, PNG & GIF files are allowed.\";</script>";
				$uploadOk = 0;
				exit;
			}
			
			if ($uploadOk == 0) {
				echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
				echo "<script>document.getElementById(\"error\").innerHTML+=\" Sorry, your file was not uploaded.\";</script>";
				exit;
			} else {
				if (move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_file)) {
					$query = "INSERT into images (image) values ('$file_name')";
					if($sql = mysqli_query($con, $query)){
						$query = "INSERT into product_images (product_id,image_id) values ($pid,".mysqli_insert_id($con).")";
						$sql = mysqli_query($con, $query);
					}
					$i++;
				}
				else {
					echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
					echo "<script>document.getElementById(\"error\").innerHTML+=\" Sorry, there was an error uploading your file.\";</script>";
					exit;
				}
			}
		}
	} else {
		echo "<script>document.getElementById(\"state\").style.display=\"block\";</script>";
		echo "<script>document.getElementById(\"error\").innerHTML+=\" Please upload images\";</script>";
		exit;
	}
}
?>
