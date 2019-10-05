<?php

function days($seconds, $start_date) {
  $seconds = $seconds - $start_date;
  return $seconds / 86400;
}

function get_csv($file) {
  $array = [];
  $csvFile = file($file);

  foreach($csvFile as $line) {
    $array[] = str_getcsv($line);
  }
  return $array;
}

function get_uk_timestamp($date) {
  $d = date_parse_from_format("d/m/Y", $date);
  $us_time = $d["month"] . "/" . $d["day"] . "/" . $d["year"];
  return strtotime($us_time);
}

function random_color_darker($minVal = 0, $maxVal = 255) {
    $minVal = $minVal < 0 || $minVal > 255 ? 0 : $minVal;
    $maxVal = $maxVal < 0 || $maxVal > 255 ? 255 : $maxVal;

    $r = mt_rand($minVal, $maxVal);
    $g = mt_rand($minVal, $maxVal);
    $b = mt_rand($minVal, $maxVal);

    return sprintf('#%02X%02X%02X', $r, $g, $b);
}

function addDays($date, $days) {
  $date = get_uk_timestamp($date);
  $seconds = $days * 86400;
  $date = $date + $seconds + 43200;
  $d = date("d/m/Y", $date);
  return $d;
}

?>