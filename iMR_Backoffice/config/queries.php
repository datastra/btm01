<?php 

switch ($page) {

	case 'installation';
	
	break;

	case 'meterReading':
		
	if(isset($_POST['submitted'] )== 1) {
		echo "row count".$_POST['rowCount_reading'];
	for($i=1; $i<=$_POST['rowCount_reading']; $i++) {
		
		if ($_POST['manualEntryValue'.$i] == '') {
			$manualEntryValue = 'reading_nbr = NULL';
		} else {
			$manualEntryValue = "reading_nbr = ".$_POST['manualEntryValue'.$i].", entered_by_user_id='".$user['id']."', entered_ts=now()";
		}


		$action = 'updated';	
		$q = "UPDATE meter_snap_log SET ".$manualEntryValue." WHERE mobile_nbr = '".$_POST['mobile_nbr'.$i]."' 
		AND snap_ts = '".$_POST['snap_ts'.$i]."' AND snap_file_nm = '".$_POST['snap_file_nm'.$i]."'";	
		
		
		$r = mysqli_query($dbc, $q);
		
		if ($r) {
			
			$message = '<p class="alert-success">Reading was '.$action.'!</p>';
			
		} else {
			
			$message = '<p class="alert-danger">Reading could not be '.$action.' because: '.mysqli_error($dbc);
			$message .= '<p class="alert-warning">'.$q.'</p>';
		}
		
	}
		//if(isset($_GET['locationId'])) { $opened = data_meter($dbc, $_GET['locationId']); }
		
	}
	break;

	case 'users':
	
	if(isset($_POST['submitted'] )== 1) {
		
		$first = mysqli_real_escape_string($dbc, $_POST['first']);
		$last = mysqli_real_escape_string($dbc, $_POST['last']);
		
		if ($_POST['password'] != '') {
			
			if ($_POST['password'] == $_POST['passwordv']) {
					$password = " password = SHA1('$_POST[password]'),";	
					$verify = true;
			
			} else {
				$verify = false;
			}
			
		}	else {
			$verify = false;
			
		}	
		if (isset($_POST['id']) != '') {
		$action = 'updated';	
		$q = "UPDATE users SET first = '$first', last = '$last', email = '$_POST[email]', $password status = $_POST[status] WHERE id = $_GET[id]";
		$r = mysqli_query($dbc, $q);	

		}
		
		else {
			$action = 'added';	
		
			$q = "INSERT INTO users (first, last, email, password, status) VALUES ('$first', '$last', '$_POST[email]', SHA1('$_POST[password]'), '$_POST[status]')";
			if ($verify == true) {
			$r = mysqli_query($dbc, $q);
		}
		}
		
	
		
		if ($r) {
			
			$message = '<p class="alert-success">User was '.$action.'!</p>';
			
		} else {
			
			$message = '<p class="alert-danger">User could not be '.$action.' because: '.mysqli_error($dbc);
			if ($verify == false) {
				$message .= '<p class="alert-danger">Passwords fields empty and/or do not match.</p>';
			}
			$message .= '<p class="alert-warning">Query: '.$q.'</p>';
		}
		
	}	
	
	if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
	
	break;
		
	case 'settings':
	
	if(isset($_POST['submitted'] )== 1) {
		
		$label = mysqli_real_escape_string($dbc, $_POST['label']);
		$value = mysqli_real_escape_string($dbc, $_POST['value']);
		
		
		if (isset($_POST['id']) != '') {
		$action = 'updated';	
		$q = "UPDATE settings SET id = '$_POST[id]', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
		$r = mysqli_query($dbc, $q);	
		}
		
	
		
		if ($r) {
			
			$message = '<p class="alert-success">Setting was '.$action.'!</p>';
			
		} else {
			
			$message = '<p class="alert-danger">Setting could not be '.$action.' because: '.mysqli_error($dbc);
			$message .= '<p class="alert-warning">Query: '.$q.'</p>';
		}
		
	}	

	
	break;		
	
	default:
		
	break;
}


?>