<?php

/*
 * простой сниппет для вывода русской даты
*/

$input = isset($input) ? $input: '';
$d = strtotime($input);
$monthes = array('', 'января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря');
$day = date("j",$d);
$month = $monthes[date("n",$d)];
$year = date("Y", $d);

return $day.' '.$month.' '.$year;
