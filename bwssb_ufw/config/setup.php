<?php
// Setup File:

error_reporting(0);

# Database Connection:
require_once 'config/connection.php'; // include the database and server connection file

# Constants:
DEFINE('D_TEMPLATE', 'template');

# Functions:
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');

# Site Setup:
$debug = data_setting_value($dbc, 'debug-status');

$site_title = data_setting_value($dbc, 'site-title');

if(isset($_GET['page'])) {
	
	$page = $_GET['page']; // Set $pageid to equal the value given in the URL
	
} else {
	
	$page = 'current_month_ufw'; // Set $pageid equal to 1 or the Home Page.
	
}


# User Setup:
$user = data_user($dbc, $_SESSION['username']);

# Page Setup:
include('config/queries.php');


?>