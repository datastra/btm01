<nav class="navbar navbar-default navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="#" class="navbar-brand">BWSSB</a>
      			<ul class="nav navbar-nav">
	
				<!--<li><a href="?page=ufw_current_month_view">View</a></li>-->
				<li><a href="?page=ufw_inlet_entry">Inlet</a></li>
				<li><a href="?page=ufw_consumption_entry">Consumption</a></li>
				<li><a href="?page=ufw_dma_rr_entry">DMA RR Mapping</a></li>
					<?php if($user['role'] == Admin) { ?>
						<li><a href="?page=users">User Management</a></li>
					<?php } ?>	
				<li><a href="?page=change_password">Change Password</a></li>					
			</ul>
    </div>

		<div class="pull-right">
			<ul class="nav navbar-nav">
	
				<li>
					<?php if($debug == 1) { ?>
						<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
					<?php } ?>				
				</li>	
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['fullname'].",".$user['subdivision_name'] ; ?> <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>

			</ul>
		</div>    
  </div>
</nav>



