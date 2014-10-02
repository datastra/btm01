<h3>Meter Reading Manual Entry</h3>



<div class="container bs-docs-container">
	<div class="row">
		
	<div class="col-md-10">
		<div class="bs-docs-section">
			<?php 
			
				if(isset($message)) { echo $message; };
				
			?>
			
			<form action="?page=meterReading" method="post" role="form">
			
					<table data-toggle="table" data-height="499">
				    <thead>
				        <tr>
				            <th data-field="id">Mobile #</th>
				            <th data-field="name">Date & Time</th>
				            <th data-field="price">Meter Image</th>
				            <th data-field="Reading">Reading</th>
				        </tr>
				    </thead>
				
						<?php 


					
						
													
								$q = "SELECT * FROM meter_snap_log WHERE reading_nbr is NULL OR reading_nbr='' OR reading_nbr=0 ORDER BY snap_ts desc";
								$r = mysqli_query($dbc, $q);
								$count = mysqli_num_rows($r); // Get the rows count
								$i = 0;
								while ($list = mysqli_fetch_assoc($r)) {
									$i = $i + 1;
						?>
				        <tr>
				            <td><?php echo $list['mobile_nbr']?></td>

				            <td><?php echo $list['snap_ts']?></td>
				            <td><div id="container">
<div id="imgtag"> 

  <img id="<?php echo $list['snap_file_nm']; ?>" src="images/<?php echo $list['snap_file_nm']; ?>" /> 
  <div id="tagbox">
  </div>
</div> 
<div id="taglist"> 
  <ol> 
  </ol> 
</div> 
</div>	</td>
							<td><input class="form-control" type="number" name="manualEntryValue<?php echo $i ?>" id="manualEntryValue<?php echo $i ?>" value=<?php echo $list['reading_nbr']; ?> autocomplete= "off" placeholder="Enter the Reading" >
							<input type="hidden" name="mobile_nbr<?php echo $i ?>" value=<?php echo $list['mobile_nbr']; ?> />
							<input type="hidden" name="snap_ts<?php echo $i ?>" value="<?php echo $list['snap_ts']; ?>" />
							<input type="hidden" name="snap_file_nm<?php echo $i ?>" value=<?php echo $list['snap_file_nm']; ?> />
							</td>
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

	
