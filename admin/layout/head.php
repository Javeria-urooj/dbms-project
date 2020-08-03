<head>
	<title>E-commerce</title>
	<?php if(strpos($_SERVER['REQUEST_URI'],'edit.php')) { ?>
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<?php } ?>
	<!--Custom Theme files -->
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="../css/example-styles.css">

	<!--//Custom Theme files -->
	<!--js-->
	<script src="../js/jquery-1.11.1.min.js"></script>
	
	<script type="text/javascript" src="../js/jquery.multi-select.js"></script>
	<script defer src="../js/jquery.flexslider.js"></script>
	<?php if(strpos($_SERVER['REQUEST_URI'],'edit.php')) { ?>
		<script src="../js/modernizr.custom.js"></script>
		
		<!--flex slider-->
		
		<link rel="stylesheet" href="../css/flexslider1.css" type="text/css" media="screen" />
		<script src="../js/imagezoom.js"></script>
		<!--flex slider-->
	<?php } ?>
	<!--//js-->
	<!--cart-->
	<script src="../js/simpleCart.min.js"></script>
	<!--cart-->
	<!--web-fonts-->
	<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'><link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tinos">
	<!--web-fonts-->
	<!--animation-effect-->
	<link href="../css/animate.min.css" rel="stylesheet"> 
	<script src="../js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
		<!--//animation-effect-->
		<?php if($_SERVER['REQUEST_URI'] == "/ecom2/admin/home.php") { ?>
			<script>
				$(document).ready(function(c) {
					$('#1').on('click', function(c){
						$('.cart-header1').fadeOut('slow', function(c){
							$('.cart-header1').remove();
						});
					});
					
					$('#2').on('click', function(c){
						$('.cart-header2').fadeOut('slow', function(c){
							$('.cart-header2').remove();
						});
					});
					
					$('#3').on('click', function(c){
						$('.cart-header3').fadeOut('slow', function(c){
							$('.cart-header3').remove();
						});
					});	
					
					$('#4').on('click', function(c){
						$('.cart-header4').fadeOut('slow', function(c){
							$('.cart-header4').remove();
						});
					});
		
					$('#5').on('click', function(c){
						$('.cart-header5').fadeOut('slow', function(c){
							$('.cart-header5').remove();
						});
					});
		
				$('#pro').on('change', function() {
				   if(this.value=='logout'){
					   $.post("users.php", 
						{ action: "logout" }, 
						  function(data) { 
							  location.reload(true);
							} 
						);
					}
					else if(this.value=='account'){
						window.location.href ="account.php";
					}else if(this.value=='add'){
					   window.location.href ="addnew.php";
				   }else if(this.value=='all'){
					   window.location.href ="uproducts.php";
				   }
				});
			});
		</script>
		<?php } ?>
		
		<?php if(strpos($_SERVER['REQUEST_URI'],'edit.php') || strpos($_SERVER['REQUEST_URI'],'addnew.php')) { ?>
			<script>
				// Can also be used with $(document).ready()
				$(window).load(function() {
				  $('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				  });
					$('#pro').on('change', function() {
										 $.post(  
								  "users.php", 
								  { action: "logout" }, 
								  function(data) { 
									  location.reload(true);
								  } 
							   );
					
										  
										  
				  //alert( this.value );
				});
				 $(function(){
							 $('#color').multiSelect();
							 $('#size').multiSelect();
										});
				  
				});
				// function load(){
				 // count=document.getElementById('fileupload');  
				 
					// if(count.files.length==3){
					   // return true;
				   // }else{
					   // alert('plase select 3 images');
					   // return false;
				   // }
				// }


				</script>
		<?php } ?>

		<!--start-smooth-scrolling-->
		<script type="text/javascript" src="../js/move-top.js"></script>
		<script type="text/javascript" src="../js/easing.js"></script>	
		<script type="text/javascript">
				jQuery(document).ready(function($) {
					$(".scroll").click(function(event){		
						event.preventDefault();
						$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
					});
								
				});
		</script>
		<!--//end-smooth-scrolling-->
	</head>