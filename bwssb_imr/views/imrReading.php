<h3>iMR Readings</h3>



<div class="container bs-docs-container">
	<div class="row">
		
	<div class="col-md-10">
		<div class="bs-docs-section">
			<?php 
			
				if(isset($message)) { echo $message; };
				
			?>
			
			<form action="?page=imrReading" method="post" role="form">
			
					<table data-toggle="table" data-height="499">
				    <thead>
				        <tr>
				            <th data-field="id">R.R. Number</th>
				            <th data-field="name">Reading Date</th>
				            <th data-field="price">Reading Time</th>
				            <th data-field="Reading">Meter Reading</th>
				        </tr>
				    </thead>
				
						<?php 
							
								$q = "SELECT * FROM imrReading";
								$r = mysqli_query($dbc, $q);
								$count = mysqli_num_rows($r); // Get the rows count
								$i = 0;
								while ($list = mysqli_fetch_assoc($r)) {
									$i = $i + 1;
						?>
				        <tr>
				            <td><?php echo $list['meter_nbr']?></td>
				            <td><?php echo $list['snap_dt']?></td>
							<td><?php echo $list['snap_tm']?></td>
							<td><?php echo $list['reading_nbr']?></td>
				        </tr>

						<?php } ?>
				 
					</table>
					<button type="submit" class="btn btn-default">Save</button>			
					<input type="hidden" name="submitted" value="1">	
					<input type="hidden" name="rowCount_reading" value=<?php echo $count ?> /> 
			</form>
		
		</div>
	</div>	
</div>

</div>

	
