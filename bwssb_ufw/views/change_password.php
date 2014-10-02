

<div class="container">

	<div class="row">

	<div class="col-md-4 col-md-offset-4" >
			
		
					<div class="panel panel-info">
					
						<div class="panel-heading">
							<strong>Change Your Password</strong>
						</div><!-- END panel-heading -->
						
						<div class="panel-body">
							<?php 
							
								if(isset($message)) { echo $message; };
								
							?>
													
							<form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post" role="form">
							  
							  <div class="form-group">
							    <label for="password">Current Password</label>
							    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							  </div>
							  
							  
							  <div class="form-group">
							    <label for="passwordn">New Password</label>
							    <input type="password" class="form-control" id="passwordn" name="passwordn" placeholder="New Password">
							  </div>
							  
							  							  							  
							  <div class="form-group">
							    <label for="passwordnv">Confirm New Password</label>
							    <input type="password" class="form-control" id="passwordnv" name="passwordnv" placeholder="New Password">
							  </div>
							  
							  <!--
							  <div class="checkbox">
							    <label>
							      <input type="checkbox"> Check me out
							    </label>
							  </div>
							  -->
								<input type="hidden" name="submitted" value="1">							  
							  <button type="submit" class="btn btn-default">Submit</button>
							  
							</form>
						
						</div><!-- END panel-body -->
					
					</div><!-- END panel -->	

	</div>

</div>
</div>
