<?php
# Chargement du .env
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();



require "src/views/register.php";

require('src/models/user.php');