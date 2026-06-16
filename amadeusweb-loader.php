<?php
include_once __DIR__ . '/../../spring/entry.php';

DEFINE('SITENAME', pathinfo(SITEPATH, PATHINFO_FILENAME));
DEFINE('NETWORKPATH', __DIR__);

variables([
	VARNetwork => 'Aztras',
]);

if (DEFINED('SITEVARS')) variables(SITEVARS);
runFrameworkFile('site/begin');
