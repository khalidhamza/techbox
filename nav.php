<nav class="navbar navbar-inverse navbar-fixed-top pmd-navbar pmd-z-depth">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button class="pmd-ripple-effect navbar-toggle pmd-navbar-toggle" type="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a href="javascript:void(0);" class="navbar-brand navbar-brand-custome white">TechBox</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse pmd-navbar-sidebar">
		  <div class="dropdown pmd-dropdown pmd-user-info pull-right">
			  <a href="javascript:void(0);" class="btn-user dropdown-toggle media white" data-toggle="dropdown" data-sidebar="true" aria-expanded="false">				  
				<div class="media-body media-middle">
					<?php print_r($_SESSION['user']);?>
				</div>
				<div class="media-right media-middle">
					<i class="material-icons md-dark pmd-sm" style="color:white">more_vert</i>
				</div>
			  </a>
			  <ul class="dropdown-menu dropdown-menu-right" role="menu">
				<li><a href="javascript:void(0);">Edit Profile</a></li>
				<li><a href="logout.php">Logout</a></li>
			  </ul>
			</div>
		  <ul class="nav navbar-nav">
			<li><a class="pmd-ripple-effect white" href="view_categories.php">Category <span class="sr-only">(current)</span></a></li>
			<li><a class="pmd-ripple-effect white" href="view_items.php"> Items</a></li>			
		  </ul>		  
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
	<div class="pmd-sidebar-overlay"></div>
</nav>
<div class="main_content">