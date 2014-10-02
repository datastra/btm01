<?php
/**

**/


$q = "SELECT distinct area_id, area_name FROM `lnd_consumption` WHERE subdivision_name = '".$user['subdivision_name']."' ORDER BY 2 ASC"; 
$query = mysqli_query($dbc, $q); // Select from the table
$count = mysqli_num_rows($query); // Get the rows count


if(isset($_GET['area_id'])) {
	
$area_id = $_GET['area_id']; // Set $area_id to equal the value given in the URL

}
?>

<div id="wrapper">
  <div id="sidebar-wrapper" class="col-md-2">
            <div id="sidebar">
                <ul class="nav list-group">
            	<?php
                // Display the rows in inputs that can be editable
                while($row = mysqli_fetch_assoc($query))      {
                    $i = $i + 1;
                ?>                	
                    <li>
                        <a class="list-group-item<?php echo $i; ?>" href="?page=ufw_consumption_entry&area_id=<?php echo $row['area_id']; ?>&area_name=<?php echo $row['area_name']; ?>"><i class="icon-home icon-1x"></i><?php echo $row['area_name']; ?></a>
                    </li>
              	<?php
                	}
            	?>                    
                </ul>
            </div>
        </div>

	 

<?php if(isset($_GET['area_id'])) { 
   	
$q1 = "SELECT * FROM `lnd_consumption` WHERE subdivision_name = '".$user['subdivision_name']."' AND area_id = '".$area_id."' ORDER BY 1,2,3 ASC";

$query1 = mysqli_query($dbc, $q1); // Select from the table

$r = mysqli_fetch_assoc($query1);



mysqli_data_seek($query1, 0);

$count1 = mysqli_num_rows($query1); // Get the rows count
   	
?>


        <div id="main-wrapper" class="col-md-10 pull-right">
            <div id="main">
				<div class="page-header">
					<h4>Consumption for Area : <?php echo $_GET['area_name'] ?> for the month of <?php echo month_year_e($r['month_year']); ?></h4>
				</div>
				<div class="page-body">
			<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline" role="form">

			           	 	
						<table align="center" class="table table-condensed" >
				            <tr>
				                <td align="center">DMA Id</td>
				                <td align="center">Outlet Qty</td>
				                <td align="center">Other SD Outlet Qty</td>
				                <td align="center">Board Offices Qty</td>                                
				                <td align="center">Filling Points Qty</td>
				                <td align="center">Metered Taps Qty</td>
				                <td align="center">Unmetered Public Taps #</td>
				                <td align="center">Unmetered Public Taps Qty</td>
				                <td align="center">Unauthorised #</td>
				                <td align="center">Unauthorised Qty</td>                
				                <td align="center">Unauthorised Slum #</td>
				                <td align="center">Unauthorized Slum Qty</td>
				            </tr>
						
				            <?php
				                // Display the rows in inputs that can be editable
			            	$i = 0;
				                while($row = mysqli_fetch_assoc($query1))      {
				                    $i = $i + 1;
				            ?>
				
				            <tr>
				                <td align="center"><input type="hidden" name="area_id<?php echo $i; ?>" value="<?php echo $row['area_id']; ?>" class="input" />
				                	<input type="hidden" name="dma_id<?php echo $i; ?>" value="<?php echo $row['dma_id']; ?>" class="input" /><?php echo $row['dma_id']; ?></td>
				
								<td align="center"><input type="text" style = "text-align: right" size = "5" name="outlet_qty<?php echo $i; ?>" value="<?php echo $row['outlet_qty']; ?>" class="input" 
												    <?php if ($row['outlet_edit_flg']=='Y' OR $row['outlet_edit_flg']=='y') {echo "";} else {echo "readonly";} ?> /></td>                                
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="othr_sub_div_outlet_qty<?php echo $i; ?>" value="<?php echo $row['othr_sub_div_outlet_qty']; ?>" class="input" /></td>
												
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="board_office_qty<?php echo $i; ?>" value="<?php echo $row['board_office_qty']; ?>" class="input" 
									<?php if ($row['board_office_edit_flg']=='Y' OR $row['outlet_edit_flg']=='y') {echo "";} else {echo "readonly";} ?> /></td>
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="filling_point_qty<?php echo $i; ?>" value="<?php echo $row['filling_point_qty']; ?>" class="input" 
									<?php if ($row['filling_point_edit_flg']=='Y' OR $row['outlet_edit_flg']=='y') {echo "";} else {echo "readonly";} ?>
									/></td>
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="metered_tap_qty<?php echo $i; ?>" value="<?php echo $row['metered_tap_qty']; ?>" class="input" /></td>
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="unmetered_public_tap_cnt<?php echo $i; ?>" value="<?php echo $row['unmetered_public_tap_cnt']; ?>" class="input" /></td>
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="unmetered_public_tap_qty<?php echo $i; ?>" value="<?php echo $row['unmetered_public_tap_qty']; ?>" class="input" /></td>				
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="unauthorised_cnt<?php echo $i; ?>" value="<?php echo $row['unauthorised_cnt']; ?>" class="input" /></td>
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="unauthorised_qty<?php echo $i; ?>" value="<?php echo $row['unauthorised_qty']; ?>" class="input" /></td>				
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="unauthorised_slum_cnt<?php echo $i; ?>" value="<?php echo $row['unauthorised_slum_cnt']; ?>" class="input" /></td>
								<td align="center"><input type="text" style = "text-align: right" size = "5"  name="unauthorised_slum_qty<?php echo $i; ?>" value="<?php echo $row['unauthorised_slum_qty']; ?>" class="input" /></td>
				            </tr>
				            <?php
				                }
				            ?>
				            <tr>
				                <td colspan="15" align="center">
				                <input type="hidden" name="submitted" value=1 /> 
				                <input type="hidden" name="rowCount_outlet" value=<?php echo $count1 ?> /> 
							      <div class="form-group">
								    <input type="submit" class="form-control" name="SubmitUpdate" value="Update" />
								  </div>	</td>
				            </tr>
				
				         </table>
					</form>
				</div>
            </div>
        </div>
              	<?php
                	} else { ?>

		<div id="main-wrapper" class="col-md-10 pull-right">
            <div id="main">
				<div class="page-header">
					<h4>Select an Area to enter the consumption quantities</h4>
				</div>
			</div>
		</div>							
            		
<?php } ?>
            	         
</div>

