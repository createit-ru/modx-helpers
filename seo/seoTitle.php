<?php

$result = $modx->resource->getTVValue("seoTitle");
if(empty($result)){
    $result = $modx->resource->get("longtitle");
    if(empty($result)){
        $result = $modx->resource->get("pagetitle");
    }
}

// для всех страниц, кроме главной, добавляем имя сайта к заголовку
if($modx->getOption("site_start") != $modx->resource->get("id")){
  $result = $result . " - " . $modx->getOption("site_start");;
}

return $result;
