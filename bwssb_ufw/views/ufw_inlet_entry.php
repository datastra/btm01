
<div class="col-md-2">

</div>
			<?php 
			   	
			$q3 = "SELECT * FROM `lnd_inlet` WHERE subdivision_name = '".$user['subdivision_name']."' ORDER BY 1 ASC";
			
			 
			$query3 = mysqli_query($dbc, $q3); // Select from the table
			
			$r = mysqli_fetch_assoc($query3);

			mysqli_data_seek($query3, 0);
			
			$count3 = mysqli_num_rows($query3); // Get the rows count
			   	
			?>
<div id="main-wrapper" class="col-xs-10">
    <div id="main">
		<div class="page-body">
			<h4>Inlet Quantity for Sub-Division : <?php echo $user['subdivision_name'] ?> for the Month of <?php echo month_year_e($r['month_year']); ?></h4>
		</div>
		<div class="page-body">
		<table>
		<thead>
		  <tr>
		    <th style = "text-align: center" >Inlet Name</th>
		    <th style = "text-align: center" >Inlet Quantity</th>
		  </tr>
		</thead>
		<tbody>					
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline" role="form">
	            <?php
	            $i = 0;
	                // Display the rows in inputs that can be editable

	            while($row = mysqli_fetch_assoc($query3))      {
	                    $i = $i + 1;
	            ?>
				<tr>
				    <td>
					  <div class="form-group" style = "text-align: right" >
					    <p><?php echo $row['inlet_name']."     :      "; ?></p>
					    <input type="hidden" name="inlet_id<?php echo $i;?>" value="<?php echo $row['inlet_id'];  ?>" />
					  </div>
				</td>
				<td>					  
			  <div class="form-group">
			    <input type="number" style = "text-align: right" class="form-control" name="inlet_qty<?php echo $i;?>" value="<?php echo $row['inlet_qty'];  ?>" 
			    <?php if ($row['edit_flg']=='Y' OR $row['edit_flg']=='y') {echo "";} else {echo "readonly";} ?>
			     placeholder="Enter Inlet Quantity"/>
			  </div>

		</td>
	</tr>					  
	            <?php
	                }
	            ?>	
	<tr>
		<td></td>
		<td>
			  <div class="form-group">
			    <input type="submit" class="form-control" name="SubmitUpdate" value="Update" />
			  </div>			            
	           <input type="hidden" name="rowCount_inlet" value=<?php echo $count3; ?> />
		       <input type="hidden" name="submitted" value=1 /> 		
		</td>
	</tr>



</tbody>
</table>			            

			</form>
		</div>
    </div>
</div>
        
