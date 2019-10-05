<?php

$start = "01/01/1850";
$start_date = get_uk_timestamp($start);
$start_datetime = new DateTime($start);
$start_year = $start_datetime->format('Y');
$years = (date("Y") + 1) - $start_year;
$folder = "world_leaders";
$files = [	"british_monarch", 
			"prime_minister", 
			"us_president"];
$dataset = [];

foreach($files as $file) {
	$dataset[$i] = get_csv($folder . "/" . $file . ".csv");
	$i++;
}

$since = days(time());
?>