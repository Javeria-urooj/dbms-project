<head>
	<title>E-commerce</title>
	
	
	<!--Custom Theme files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<!--//Custom Theme files -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tinos">
	<!--js-->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/modernizr.custom.js"></script>
	<!--//js-->

	<!--cart-->
	<script src="js/simpleCart.min.js"></script>
	<!--cart-->
	
	<!--animation-effect-->
	<link href="css/animate.min.css" rel="stylesheet"> 
	<script src="js/wow.min.js"></script>
	
	<script defer src="js/jquery.flexslider.js"></script>

	<script>
	 new WOW().init();
	</script>
	<!--//animation-effect-->
	
	<?php if(strpos($_SERVER['REQUEST_URI'],'single.php')) { ?>
	<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
		
	});
	</script>
	<!--flex slider-->
	<script src="js/imagezoom.js"></script>
	<!--cart-->
	<script src="js/simpleCart.min.js"></script>
	<!--cart-->
	
	<?php } ?>
	<?php if(strpos($_SERVER['REQUEST_URI'],'checkout.php')) { ?>
		<!--close-button-->
		<script>$(document).ready(function(c) {
			$('.alert-close').on('click', function(c){
				$('.cart-header').fadeOut('slow', function(c){
					$('.cart-header').remove();
				});
			});	  
		});
		</script>
		<script>$(document).ready(function(c) {
			$('.alert-close1').on('click', function(c){
				$('.cart-header1').fadeOut('slow', function(c){
					$('.cart-header1').remove();
				});
			});	  
		});
		</script>
		<script>$(document).ready(function(c) {
			$('.alert-close2').on('click', function(c){
				$('.cart-header2').fadeOut('slow', function(c){
					$('.cart-header2').remove();
				});
			});	  
		});
		</script>
	<?php } ?>
		<!--//close-button-->
	<!--start-smooth-scrolling-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
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
				}
				else if(this.value=='add'){
					window.location.href ="addnew.php";
				}
				else if(this.value=='all'){
					window.location.href ="uproducts.php";
				}
	
			});
		});
				

</script>
<!--//end-smooth-scrolling-->
</head>