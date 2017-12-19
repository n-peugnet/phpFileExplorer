<?php
require 'includes/config.php';
header('Content-type: image/jpeg');
readfile(EXPLORER_ROOT.$_GET['source']);
?>