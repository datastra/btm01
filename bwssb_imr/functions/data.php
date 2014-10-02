<?php

function data_setting_value($dbc, $id) {
	
	$q= "SELECT * from settings WHERE id ='$id'";
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);

	return $data['value'];
}


function data_user($dbc, $id) {
	
	if (is_numeric($id)) {
		$cond = "WHERE id = '$id'";
		
	} else {
			
		$cond = "WHERE email = '$id'";
	};
	
	$q = "SELECT * FROM users $cond";
	$r = mysqli_query($dbc, $q);
	
	$data = mysqli_fetch_assoc($r);
	
	$data['fullname'] = $data['first'].' '.$data['last'];
	$data['fullname_reverse'] = $data['last'].', '.$data['first'];
	
	return $data;
	
	
}


function data_meter($dbc, $id) {

$q = "SELECT * from meter_reading_current_cycle WHERE locationId = '$id'";

$r = mysqli_query($dbc, $q);

$data = mysqli_fetch_assoc($r);

return $data;

}# Page Setup

function data_page($dbc, $id) {
	
if (is_numeric($id)) {
	$cond = "WHERE id = $id";
	
} else {
	$cond = "WHERE slug = '$id'";
	
}

	
$q = "SELECT * from pages $cond";
$r = mysqli_query($dbc, $q);

$data = mysqli_fetch_assoc($r);

$data['body_nohtml'] = strip_tags($data['page_body']);

if($data['page_body'] == $data['body_nohtml']) {
	
	$data['body_formatted'] = '<p>'.$data['page_body'].'</p>';

} else {
	
	$data['body_formatted'] = $data['page_body'];
	
}


return $data;
	
}# Page Setup



?>