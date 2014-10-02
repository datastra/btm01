<?php


function selected($value1, $value2, $return) {
	
	if($value1 == $value2) {
		echo $return;
	}
	
}



function month_year_e($month_year_number) {
	// Returns Month and Year in the form "January - 2014".
	$months = array( 'January'=> 1, 
					'February' => 2, 
					'March' => 3, 
					'April' => 4,
					'May' => 5,     
					'June' => 6,     
					'July' => 7,  
					'August' => 8,
					'September' => 9, 
					'October' => 10, 
					'November' => 11,
					'December' => 12);		
	
	$month_string = substr($month_year_number, 0, 2);
	$year_string = substr($month_year_number, 2, 4);
	
	
	return array_search($month_string, $months)." - ".$year_string;				 

}


?>