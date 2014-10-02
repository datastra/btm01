<nav class="navbar navbar-default" role="navigation">
			<ul class="nav navbar-nav">
			
				<li><a href="?page=imrReading">iMR Reading</a></li>

				
			</ul>	

			<div class="pull-right">			
				<ul class="nav navbar-nav">
					<li>	
						<?php if ($debug == 1 ) { ?>
					
						<button type="button" id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
						
						<?php } ?>
					</li>
					<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user['fullname']; ?> <span class="caret"></span></a>
			          <ul class="dropdown-menu" role="menu">
			          	<li><a href="logout.php">Logout</a></li>
			          </ul>			          
			        </li>					
					
					
				</ul>	
			</div>
			
					
</nav> <!-- END nav -->