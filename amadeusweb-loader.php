<?php
DEFINE('SITENAME', pathinfo(SITEPATH, PATHINFO_FILENAME));
DEFINE('NETWORKPATH', __DIR__);
DEFINE('NETWORKNAME', pathinfo(NETWORKPATH, PATHINFO_FILENAME));

include_once __DIR__ . '/../../dawn/spring/entry.php';
disk_include_once(__DIR__ . '/network.php');

if (DEFINED('SITEVARS')) variables(SITEVARS);
runFrameworkFile('site/begin');
