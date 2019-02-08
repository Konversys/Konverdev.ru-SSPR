<?php
header('Content-Type: text/html; charset=UTF-8');
require_once 'src/connect.php';
require_once 'src/functions.php';
$website = require_once __DIR__ . '/app/app.php';
$website->run();
?>
