<?php

$titles = array(
  'Ресурс 1',
  'Ресурс 2'
);

foreach($titles as $title) {
  $data = array(
    'pagetitle' => $title,
    'parent' => 8,
    'template' => 2,
    'class_key' => 'msCategory',
    'published' => 1
  );
  $response = $modx->runProcessor('resource/create', $data);
}
