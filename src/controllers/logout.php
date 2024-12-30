<?php
session_start();
session_destroy();

$basePath = dirname($_SERVER['SCRIPT_NAME']);
$basePath = str_replace('\\', '/', $basePath);

header('Location:' . $basePath . '/');
exit();