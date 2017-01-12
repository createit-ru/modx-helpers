<?php

$result = '';

$result = $modx->resource->getTVValue("seoTitle");
if(empty($result)){
    $result = $modx->resource->get("longtitle");
}
if(empty($result)){
    $result = $modx->resource->get("pagetitle");
}

// для всех страниц, кроме главной, добавляем имя сайта к заголовку
if($modx->config["site_start"] != $modx->resource->get("id")){
  $sitename = $modx->config["site_name"];
  $result = $result." - ".$sitename;
}

return $result;
