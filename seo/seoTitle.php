<?php
$pagetitle = $modx->resource->get("pagetitle");
$longtitle = $modx->resource->get("longtitle");
$seotitle = $modx->resource->getTVValue("seoTitle");

$sitename = $modx->config["site_name"];

$v = '';
if($seotitle != ''){
  $v = $seotitle;
}
else{
  if($longtitle == ''){
    $v = $pagetitle;
  }
  else{
    $v = $longtitle;
  }
}

if($modx->config["site_start"] == $modx->resource->get("id")){
  return $v;
}
return $v." - ".$sitename;
