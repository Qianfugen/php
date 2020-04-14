<?php
$datasource=parse_ini_file(realpath(dirname(__FILE__).'/config/datasource.ini'));
$host=$datasource["host"];
$username=$datasource["username"];
$password=$datasource["password"];
$dbname = $datasource["dbname"];
?>
