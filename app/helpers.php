<?php

function convertTimestamp($timestamp) {
	$date = explode(' ', $timestamp)[0];
	$date_ex = explode('-', $date);

	$year = $date_ex[0];
	$month = (int) $date_ex[1];
	$day = $date_ex[2];

	$array_month = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Ags', 'Sep', 'Oct', 'Nov', 'Des'];

	return $array_month[$month].' '.$day.', '.$year;
}

?>