<?php

#Database Connection Here....
$dbc = mysqli_connect('localhost', 'datastra', 'datastra', 'eReader') OR die('Could not connect because '.mysqli_connect_error());
date_default_timezone_set("Asia/Calcutta");
?>