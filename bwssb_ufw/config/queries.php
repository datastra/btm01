<?php

	switch ($page) {
		
		case 'ufw_inlet_entry':
			if(isset($_POST['submitted']) == 1) {
			for($i=1; $i<=$_POST['rowCount_inlet']; $i++) {
				if ($_POST["inlet_qty$i"] == '') {
					$setClause = 'inlet_qty = NULL';
				} else {
					$setClause = 'inlet_qty = '.$_POST["inlet_qty$i"];
				} 							
				$q = "UPDATE `lnd_inlet` 
				SET ".$setClause."
				WHERE subdivision_name = '".$user['subdivision_name']."' AND inlet_id = '".$_POST["inlet_id$i"]."'" ;
   			$r = mysqli_query($dbc, $q); // Run the Mysql update query inside for loop
   			  					}
			}
			
		break;		
		
		case 'ufw_consumption_entry':
			if(isset($_POST['submitted']) == 1) {
			for($i=1; $i<=$_POST['rowCount_outlet']; $i++) {			
				$q = "UPDATE `lnd_consumption` 
				SET outlet_qty = ".$_POST["outlet_qty$i"].", 
				othr_sub_div_outlet_qty = ".$_POST["othr_sub_div_outlet_qty$i"].", 
				metered_cnt = ".$_POST["metered_cnt$i"].", 
				metered_qty = ".$_POST["metered_qty$i"].", 
				board_office_qty = ".$_POST["board_office_qty$i"].", 
				filling_point_qty = ".$_POST["filling_point_qty$i"].", 
				metered_tap_qty = ".$_POST["metered_tap_qty$i"].",
				unmetered_public_tap_cnt = ".$_POST["unmetered_public_tap_cnt$i"].",
				unmetered_public_tap_qty = ".$_POST["unmetered_public_tap_qty$i"].", 
				unauthorised_cnt = ".$_POST["unauthorised_cnt$i"].", 
				unauthorised_qty = ".$_POST["unauthorised_qty$i"].",
				unauthorised_slum_cnt = ".$_POST["unauthorised_slum_cnt$i"].", 	
				unauthorised_slum_qty = ".$_POST["unauthorised_slum_qty$i"].", 									 												 
				updated_by = 'test',
				updated_ts = '".$date."',
				created_by = 'system',
				created_ts = '".$date."'
				WHERE subdivision_name = '".$user['subdivision_name']."' AND `area_id` = '".$_POST["area_id$i"]."' AND dma_id = '".$_POST["dma_id$i"]."'" ;
   			$r = mysqli_query($dbc, $q); // Run the Mysql update query inside for loop

   			   						}
			}
			break;
		
		case 'ufw_bulk_entry':

		break;

		
		case 'users':

			if(isset($_POST['submitted']) == 1) {
				
				$first = mysqli_real_escape_string($dbc, $_POST['first']);
				$last = mysqli_real_escape_string($dbc, $_POST['last']);
				
				if($_POST['password'] != '') {
					
					if($_POST['password'] == $_POST['passwordv']) {
						
						$password = " password = SHA1('$_POST[password]'),";
						$verify = true;
						
					} else {
						
						$verify = false;
						
					}					
					
				} else {
						
					$verify = false;	
					
				}
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE users SET first = '$first', last = '$last', email = '$_POST[email]', role = '$_POST[role]', subdivision_name = '$_POST[subdivision_name]', $password status = $_POST[status] WHERE id = $_GET[id]";
					$r = mysqli_query($dbc, $q);
					
				} else {
					
					$action = 'added';
					
					$q = "INSERT INTO users (first, last, email, password, subdivision_name, role, status) VALUES ('$first', '$last', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[subdivision_name]', '$_POST[role]', '$_POST[status]')";
					
					if($verify == true) {
						$r = mysqli_query($dbc, $q);
					}

				}
				

				
				if($r){
					
					$message = '<p class="alert alert-success">User was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">User could not be '.$action.' because: '.mysqli_error($dbc);
					if($verify == false) {
						$message .= '<p class="alert alert-danger">Password fields empty and/or do not match.</p>';
					}
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
			
		break;		
		
		case 'change_password':

			if(isset($_POST['submitted']) == 1) {
				
				$password = mysqli_real_escape_string($dbc, $_POST['password']);
				$passwordn = mysqli_real_escape_string($dbc, $_POST['passwordn']);
				$passwordnv = mysqli_real_escape_string($dbc, $_POST['passwordnv']);

				if($passwordn != '') {
					$q = "SELECT * FROM users WHERE email = '".$user['email']."' AND password = SHA1('$_POST[password]')";
					$r1 = mysqli_query($dbc, $q);

					if(mysqli_num_rows($r1) == 1) {
	
							if($passwordn == $passwordnv) {
								$password = " password = SHA1('$_POST[passwordn]')";
								$verify = true;
								$action = 'Password changed ';
								$q = "UPDATE users SET $password WHERE email = '".$user[email]."'";
								$r = mysqli_query($dbc, $q);						
								
							} else {
								
								$verify = false;
								$action = 'Password could not be changed as new passwords do not match';
								
							}					
						
						} else {
							$action = 'Invalid Password';
						}
					}
				 	else {
						
						$verify = false;	
						$action = 'Password could not be changed ';
					
					}
				 
			
				
				
				if($r1){
					
					$message = '<p class="alert alert-success">'.$action.'!</p>';
					
				} else {
										
					$message = '<p class="alert alert-danger"> '.$action.' because: '.mysqli_error($dbc);
					if($verify == false) {
						$message .= '<p class="alert alert-danger">Password fields empty and/or do not match.</p>';
					}
					//$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			
		break;				
		

		default:
			
		break;
	}




?>