<?php
$config = require 'config.php';
$rootPath = $config->rootPath;
header('Content-type: image/jpeg');
readfile('../'.$rootPath.$_GET['source']);
?>