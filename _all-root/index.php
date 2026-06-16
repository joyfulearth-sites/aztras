<?php
$subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];
DEFINE('ALLSITEPATH', realpath(__DIR__ . '/../' . $subdomain));
include_once 'catch.php';
