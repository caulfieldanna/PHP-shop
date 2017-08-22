<?php

require_once __DIR__ . '/../vendor/autoload.php';

$urls = file_get_contents('../config.json');
$app = new \Sky\Frame\App($urls);
$app->run();



