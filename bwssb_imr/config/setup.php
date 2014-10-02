<?php
// Setup File:

error_reporting(0);

# Database Connection:
include('/config/connection.php');


#constants
DEFINE('D_TEMPLATE', 'template');

# Functions
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = data_setting_value($dbc, 'site-title');

if(isset($_GET['page'])) {
	
	$page = $_GET['page'];
	
} else {
	
	$page = 'home';
}


# User Setup:
$user = data_user($dbc, $_SESSION['username']);

# Page Setup:
include('config/queries.php');






?>