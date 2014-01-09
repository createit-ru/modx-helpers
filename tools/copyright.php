<?php
$spacer = " &mdash; ";
$now = date("Y");
$start = isset($start)? $start : $now;
$years = ($now > $start) ? $start.$spacer.$now : $now;
return "$years";
