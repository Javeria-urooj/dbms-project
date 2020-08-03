<div class="top-nav navbar navbar-default"><!--header-three-->
	<div class="container">
		<nav class="navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!--navbar-header-->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav top-nav-info">
					<li><a href="../admin/home.php">Home</a></li>
					<li class="dropdown">
						<?php if(isset($_SESSION['gid'])){  ?>
						<a href="#" class="dropdown-toggle	" data-toggle="dropdown">Account<b class="caret"></b></a>
						<ul class="dropdown-menu single single-column multi-column1">
							<div class="row">
								<div class="col-sm-3 menu-grids">
									<ul class="multi-column-dropdown">
										<li><a class="list" href="../admin/account.php"><h4>Settings</h4></a></li>
										<li><a class="list" href="../logout.php"><h4>logout</h4></a></li>
									</ul>
								</div>
								<div class="clearfix"> </div>
							</div>
						</ul>
					</li>
					<li class="dropdown grid">
						<a href="#" class="dropdown-toggle list1" data-toggle="dropdown">Products<b class="caret"></b></a>
						<ul class="dropdown-menu single single-column">
							<div class="row">
								<div class="col-sm-3 menu-grids">
									<ul class="multi-column-dropdown">
										<li><a class="list" href="addnew.php"><h4>Add New</h4></a></li>
										<li><a class="list" href="home.php"><h4>All Products</h4></a></li>
									</ul>
								</div>																		
								<div class="clearfix"> </div>
							</div>
						</ul>
					</li>
						<?php } ?>
				</ul> 
				<div class="clearfix"> </div>
				<!--//navbar-collapse-->
				<header class="cd-main-header">
					<ul class="cd-header-buttons">
						<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
					</ul> <!-- cd-header-buttons -->
				</header>
			</div>
			<!--//navbar-header-->
		</nav>
		<div id="cd-search" class="cd-search">
			<form>
				<input type="search" placeholder="Search...">
			</form>
		</div>
	</div>
</div>