<?php

# Start the session:
session_start();



if(!isset($_SESSION['username'])) {
	$subdivision = '';
	header('Location: login.php');
}


?>

<?php include('config/setup.php'); ?>

<!DOCTYPE html>
<html>
	
<head>

	<title><?php echo "BWSSB".' | '.$site_title; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


	<?php include('config/css.php'); ?>
	
	<?php include('config/js.php'); ?>
	


</head>
	
<body>
	<div class="wrap">
	<?php include(D_TEMPLATE.'/navigation.php'); // Main Navigation ?>
	
