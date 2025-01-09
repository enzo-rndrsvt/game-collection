<?php


function getBasePath(): string
{
    $basePath = dirname($_SERVER['SCRIPT_NAME']);
    return rtrim(str_replace('\\', '/', $basePath), '/');
}