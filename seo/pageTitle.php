<?php
$longtitle = $modx->resource->get("longtitle");

if($longtitle != ''){
  return $longtitle;
}

return $modx->resource->get("pagetitle");
