
<div class="row">
	

<?php
$query = "SELECT * FROM lnd_dma_rr_map WHERE subdivision_name =  '".$user['subdivision_name']."' ORDER BY area_id ASC";
$result = mysqli_query($dbc, $query);


		
while($rows = mysqli_fetch_array($result))
{
	$contact_list[] = array('area_id' => $rows['area_id'], 
							'area_name' => $rows['area_name'],
							'rr_nbr' => $rows['rr_nbr']);
}
?>	
	<div class="col-md-9">
		
	<?php echo $query; ?>
		
	<div class="wrapper">
		<div class="content" >
			<table class="table table-condensed">
				<thead>
					<tr>
						<th>
							DMA Name
						</td>
						<th>
							R.R #
						</th>
						<th></th><th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($contact_list as $contact) : ?>
						<tr>
							<td>
								<?php echo $contact["area_id"]; ?>
							</td>
							<td>
								<?php echo $contact["rr_nbr"]; ?>
							</td>
							<td>
								<form method="post" action="?page=ufw_dma_rr_entry">
									<input type="hidden" name="subdivision_name" 
									value="<?php echo $user['subdivision_name']; ?>" />
									<input type="hidden" name="area_id" 
									value="<?php echo $contact["area_id"]; ?>" />
									<input type="hidden" name="rr_nbr" 
									value="<?php echo $contact["rr_nbr"]; ?>" />									
									<input type="hidden" name="action" value="edit" />
									<input type="submit" value="Edit" />
								</form> 
							</td>
							<td>
								<form method="POST" action="?page=ufw_dma_rr_entry" 
								onSubmit="return ConfirmDelete();">
									<input type="hidden" name="subdivision_name" 
									value="<?php echo $user['subdivision_name']; ?>" />
									<input type="hidden" name="area_id" 
									value="<?php echo $contact["area_id"]; ?>" />
									<input type="hidden" name="rr_nbr" 
									value="<?php echo $contact["rr_nbr"]; ?>" />	
									<input type="hidden" name="action" value="delete" />
									<input type="submit" value="Delete" />
								</form>
							</td>
						<tr>
					<?php endforeach; ?>
				</tbody>
			</table><br/>
				<form method="POST" action="?page=ufw_dma_rr_entry"
					<a><input type="hidden" name="action" value="add" />
					<input type="submit" value="Add" /></a>
				</form>
		</div>
	</div>		

		<?php if(isset($message)) { echo $message; } ?>
		
	</div>
		
</div>