	<div class="as_country_container">

<?php
/**

**/

$q = "SELECT distinct month_year FROM `lnd_inlet` WHERE subdivision_name = '".$user['subdivision_name']."' ORDER BY 1 ASC"; 
$query = mysqli_query($dbc, $q); // Select from the table
$count = mysqli_num_rows($query); // Get the rows count
?>

        <?php if($count <= 0) {
                       ?>
            <table align="center">
            <tr>
                <td>No records found!</td>
                       </tr>
            </table>
            <?php
                       }
                       else {
            $i = 0;
          ?>


<form role="form" class="form-horizontal" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    <fieldset>
      <div class="form-group">
        <label class="col-sm-2 control-label">Select Month Year:</label>
        <div class="col-sm-2">
            <select id = "month_year" class="form-control">
            	<?php
                // Display the rows in inputs that can be editable
                while($row = mysqli_fetch_assoc($query))      {
                    $i = $i + 1;
                ?>
                <option value="<?php echo $row['month_year']; ?>"><?php echo $row['month_year']; ?></option>
                
              	<?php
                	}
            	?>
            </select>
        </div>
      </div>
    </fieldset>
</form>
              	<?php
                	}
            	?>


<?php
/**
Simple Update using php mysql.
**/

$query = mysqli_query($dbc, "SELECT * FROM `lnd_inlet` WHERE subdivision_name = '".$user['subdivision_name']."' ORDER BY 1,2, 3 ASC"); // Select from the table
$count = mysqli_num_rows($query); // Get the rows count
$msg = '';

?>

    <?php echo $msg; // Display the result message generated in the above PHP actions, ?>

        <?php if($count <= 0) {
                       ?>
            <table align="center">
            <tr>
                <td>No records found!</td>
                       </tr>
            </table>
            <?php
                       }
                       else {
            $i = 0;
               ?>

<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
           <table align="center" >
			<tr> <td align="left"><h5>Inlet</h5></td></tr>
            <tr>
                <td align="center">Inlet Name</td>
                <td align="center">Inlet Qty</td>
            </tr>


            <?php
                // Display the rows in inputs that can be editable
                while($row = mysqli_fetch_assoc($query))      {
                    $i = $i + 1;
            ?>

            <tr>

                <td><input type="hidden" name="inlet_id<?php echo $i; ?>" value="<?php echo $row['inlet_id']; ?>" class="input" /><?php echo $row['inlet_name']; ?></td>


				<td><input type="number" size=9 style="text-align: right" name="inlet_qty<?php echo $i; ?>" value="<?php echo $row['inlet_qty']; ?>" 
					class="input" <?php if ($row['edit_flg'] != 'Y' ) {echo "disabled";}?>/></td>                                
								

            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="5" align="center">
                <input type="hidden" name="submitted" value=1 /> 
                <input type="hidden" name="rowCount_inlet" value=<?php echo $count ?> /> 
                <input type="submit" name="SubmitUpdate" value="Update" /></td>
            </tr>
         </table>  
            </form>
            
        <?php
               }
        ?>
                  
            
<?php
/**
Simple Update using php mysql.
**/

$query = mysqli_query($dbc, "SELECT * FROM `lnd_consumption` WHERE subdivision_name = '".$user['subdivision_name']."' ORDER BY 1,2, 3 ASC"); // Select from the table
$count = mysqli_num_rows($query); // Get the rows count
$msg = '';

?>
            
    <?php echo $msg; // Display the result message generated in the above PHP actions, ?>

        <?php if($count <= 0) {
                       ?>
            <table align="center">
            <tr>
                <td>No records found!</td>
                       </tr>
            </table>
            <?php
                       }
                       else {
            $i = 0;
               ?>

            <table align="center" class="table table-condensed">
			<tr> <td colspan="15"><h5>Consumption</h5></td></tr>
            <tr>
                <td align="center">Area Name</td>
                <td align="center">DMA Id</td>
                <td align="center">Outlet Qty</td>
                <td align="center">Other SD Outlet Qty</td>
                <td align="center">Metered #</td>
                <td align="center">Metered Qty</td>                
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
                while($row = mysqli_fetch_assoc($query))      {
                    $i = $i + 1;
            ?>

            <tr>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                <td><input type="hidden" name="area_id<?php echo $i; ?>" value="<?php echo $row['area_id']; ?>" class="input" /><?php echo $row['area_name']; ?></td>
                <td><input type="hidden" name="dma_id<?php echo $i; ?>" value="<?php echo $row['dma_id']; ?>" class="input" /><?php echo $row['dma_id']; ?></td>

				<td><input type="number" size=9 style="text-align: right" name="outlet_qty<?php echo $i; ?>" value="<?php echo $row['outlet_qty']; ?>" class="input" /></td>                                
				<td><input type="text" size=9 name="othr_sub_div_outlet_qty<?php echo $i; ?>" value="<?php echo $row['othr_sub_div_outlet_qty']; ?>" class="input" /></td>
								
				<td><input type="text" size=9 name="metered_cnt<?php echo $i; ?>" value="<?php echo $row['metered_cnt']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="metered_qty<?php echo $i; ?>" value="<?php echo $row['metered_qty']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="board_office_qty<?php echo $i; ?>" value="<?php echo $row['board_office_qty']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="filling_point_qty<?php echo $i; ?>" value="<?php echo $row['filling_point_qty']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="metered_tap_qty<?php echo $i; ?>" value="<?php echo $row['metered_tap_qty']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="unmetered_public_tap_cnt<?php echo $i; ?>" value="<?php echo $row['unmetered_public_tap_cnt']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="unmetered_public_tap_qty<?php echo $i; ?>" value="<?php echo $row['unmetered_public_tap_qty']; ?>" class="input" /></td>				
				<td><input type="text" size=9 name="unauthorised_cnt<?php echo $i; ?>" value="<?php echo $row['unauthorised_cnt']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="unauthorised_qty<?php echo $i; ?>" value="<?php echo $row['unauthorised_qty']; ?>" class="input" /></td>				
				<td><input type="text" size=9 name="unauthorised_slum_cnt<?php echo $i; ?>" value="<?php echo $row['unauthorised_slum_cnt']; ?>" class="input" /></td>
				<td><input type="text" size=9 name="unauthorised_slum_qty<?php echo $i; ?>" value="<?php echo $row['unauthorised_slum_qty']; ?>" class="input" /></td>

            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="5" align="center">
                <input type="hidden" name="submitted" value=1 /> 
                <input type="hidden" name="rowCount_outlet" value=<?php echo $count ?> /> 
                <input type="submit" name="SubmitUpdate" value="Update" /></td>
            </tr>

            </form>
         </table>

        <?php
               }
        ?>
	</div>
